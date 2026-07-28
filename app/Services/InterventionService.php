<?php

namespace App\Services;

use Carbon\Carbon;
use App\Enums\Village;
use Illuminate\Support\Str;
use App\Models\Intervention;
use Illuminate\Support\Facades\Log;
use BeyondCode\Mailbox\InboundEmail;

class InterventionService
{
    public function createFromEmail(InboundEmail $email, bool $isForwarded = false): void
    {
        Log::debug('INTERVENTION DEBUG - MAIL HTML: ', [
            'html' => $email->html()
        ]);

        $afterMarker = $isForwarded ? $this->findForwardedHeaderBlock($email) : null;

        $message = $afterMarker !== null
            ? ($this->extractForwardedBody($afterMarker) ?? $this->normalizeWhitespace($email->html()))
            : $this->normalizeWhitespace($email->html());

        // Safety net: `title` is a VARCHAR(200) column. Gmail's quoting markup (or any
        // future unexpected format) could otherwise overflow it and crash the insert.
        $message = Str::limit($message, 197);

        Log::debug('INTERVENTION DEBUG - MESSAGE: ', [
            'message' => $message,
        ]);

        $date = $afterMarker !== null
            ? ($this->extractDateFromForwardedBlock($afterMarker) ?? $email->date())
            : $email->date();

        $intervention = Intervention::create([
            'title' => $message,
            'description' => $this->extractMission($message),
            'type' => $this->extractType($message),
            'village' => $this->extractVillage($message),
            'date' => $date,
        ]);

        $this->publishIntervention($intervention);
    }

    private function normalizeWhitespace(string $text): string
    {
        // Remove new lines
        $text = Str::replace(["\r", "\n"], ' ', $text);
        // Remove double or more consecutive spaces
        return (string) Str::of($text)->replaceMatches('/ {2,}/', ' ');
    }

    /**
     * Locates Gmail's "Forwarded message" marker (English or French client) in the
     * plain-text body and returns everything after it, or null if none is found.
     * Uses the LAST marker occurrence so double-forwards resolve to the innermost,
     * original alert rather than an intermediate forward.
     */
    private function findForwardedHeaderBlock(InboundEmail $email): ?string
    {
        $text = $email->text();
        if (! $text) {
            return null;
        }

        $markerPattern = '/-{3,}\s*(?:Forwarded message|Message transf[ée]r[ée])\s*-{3,}/isu';
        if (! preg_match_all($markerPattern, $text, $markers, PREG_OFFSET_CAPTURE) || empty($markers[0])) {
            return null;
        }

        $lastMarker = end($markers[0]);

        return substr($text, $lastMarker[1] + strlen($lastMarker[0]));
    }

    /**
     * The quoted "From/Date/Subject/To" header block Gmail inserts ends at the
     * first blank line, after which the original message content begins.
     */
    private function extractForwardedBody(string $afterMarker): ?string
    {
        $parts = preg_split('/\n\s*\n/', ltrim($afterMarker, "\r\n"), 2);

        return isset($parts[1]) ? $this->normalizeWhitespace(trim($parts[1])) : null;
    }

    private function extractDateFromForwardedBlock(string $afterMarker): ?Carbon
    {
        try {
            $block = substr($afterMarker, 0, 600);

            if (! preg_match('/^\s*Date\s*:\s*(.+)$/mi', $block, $dateMatch)) {
                return null;
            }

            $rawDate = trim($dateMatch[1]);
            $rawDate = preg_replace('/[\x{00A0}]+/u', ' ', $rawDate);              // NBSP normalization
            $rawDate = preg_replace('/^\s*[A-Za-zÀ-ÿ]+\.?,?\s+/u', '', $rawDate); // drop leading weekday token
            $rawDate = preg_replace('/\s+(at|à)\s+/iu', ' ', $rawDate);          // EN "at" / FR "à" connector

            return Carbon::parseFromLocale($rawDate, 'fr', 'Europe/Zurich')?->timezone('UTC');
        } catch (\Throwable $e) {
            Log::warning('Could not extract original date from forwarded mobilisation email, falling back to envelope date', [
                'exception' => $e->getMessage(),
            ]);

            return null;
        }
    }

    public function createFromJson(string $message, string $date): void
    {
        Log::debug('INTERVENTION DEBUG - JSON IMPORT: ', [
            'message' => $message,
            'date' => $date,
        ]);

        // Remove double or more consecutive spaces
        $message = Str::of($message)->replaceMatches('/ {2,}/', ' ');

        Log::debug('INTERVENTION DEBUG - JSON MESSAGE: ', [
            'message' => $message,
        ]);

        $intervention = Intervention::create([
            'title' => $message,
            'description' => $this->extractMission($message),
            'type' => $this->extractType($message),
            'village' => $this->extractVillage($message),
            'date' => Carbon::parse($date, 'Europe/Zurich')->timezone('UTC'),
        ]);

        $this->publishIntervention($intervention);
    }

    private function publishIntervention(Intervention $intervention): void
    {
        $fields = collect([
            $intervention->village,
            $intervention->type,
        ]);

        $publishedStatus = $fields->filter()->count() === 2;

        $intervention->update(['published' => $publishedStatus]);
    }

    public function extractType(string $text): ?string
    {
        preg_match('/.* \[(.+)\] .*/mU', $text, $matches);

        $match = match ($matches[1] ?? null) {
            'MIS_INOND' => 'INONDATION',
            'MIS_HYD' => 'POLLUTION',
            'MIS_CHUTMA' => 'ELEMENT NATUREL',
            'MIS_NAC' => 'ASSISTANCE',
            'MIS_ASSIST' => 'ASSISTANCE',
            'MIS_ASCEN' => 'ASSISTANCE',
            'MIS_NAC' => 'ASSISTANCE',
            'MIS_EVAC-2' => 'ASSISTANCE',
            'MIS_EVAC-3' => 'ASSISTANCE',
            default => null,
        };

        if ($match) {
            return $match;
        }

        // Fire
        preg_match('/.* - (FEU) .*/mU', $text, $matches);
        if ($matches[1] ?? false) {
            return 'FEU';
        }

        // Flood
        preg_match('/.* - (INONDATION) .*/mU', $text, $matches);
        if ($matches[1] ?? false) {
            return 'INONDATION';
        }

        // Flood
        preg_match('/.* - (RENFORT) .*/mU', $text, $matches);
        if ($matches[1] ?? false) {
            return 'RENFORT';
        }

        preg_match('/.* - (.+) \(.*/mU', $text, $matches);

        $match = match ($matches[1] ?? null) {
            'ALARME AUTOMATIQUE' => 'TECHNIQUE',
            'TECHNIQUE FUMEE SUSPECTE' => 'TECHNIQUE',
            'TECHNIQUE ODEUR DE BRULE' => 'TECHNIQUE',
            'TECHNIQUE ODEUR SUSPECTE' => 'TECHNIQUE',
            'TECHNIQUE FUITE DE GAZ' => 'TECHNIQUE',
            'TECHNIQUE ODEUR DE GAZ' => 'TECHNIQUE',
            'TECHNIQUE COURT-CIRCUIT' => 'TECHNIQUE',
            'TECHNIQUE ODEUR D\'HYDROCARBURE' => 'TECHNIQUE',
            default => $matches[1] ?? null,
        };

        return $match;
    }

    public function extractMission(string $text): ?string
    {
        preg_match('/.* - (.+) [-\(].*/mU', $text, $matches);

        // Strip prefixes
        $prefixes = collect([
            'TECHNIQUE',
            'RENFORT',
        ]);

        $prefix = $prefixes->reduce(function ($carry, $prefix) use ($matches) {
            if (Str::of($matches[1] ?? null)->startsWith($prefix)) {
                return $prefix;
            }

            return $carry;
        });

        if ($prefix) {
            return trim(Str::replaceFirst($prefix, '', $matches[1] ?? null));
        }

        return $matches[1] ?? null;
    }

    public function extractVillage(string $text): ?string
    {
        preg_match('/.*\((.+) -.*\).*/mU', $text, $matches);
        return Village::fromIntervention($matches[1] ?? null)?->value;
    }
}
