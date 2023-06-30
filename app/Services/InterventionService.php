<?php

namespace App\Services;

use App\Enums\Village;
use Illuminate\Support\Str;
use App\Models\Intervention;
use Illuminate\Support\Facades\Log;
use BeyondCode\Mailbox\InboundEmail;

class InterventionService
{
    public function createFromEmail(InboundEmail $email): void
    {
        Log::debug('INTERVENTION DEBUG - MAIL HTML: ', [
            'html' => $email->html()
        ]);

        // Remove new lines
        $message = Str::replace(["\r", "\n"], ' ', $email->html());
        // Remove double or more consecutive spaces
        $message = Str::of($message)->replaceMatches('/ {2,}/', ' ');

        Log::debug('INTERVENTION DEBUG - MESSAGE: ', [
            'message' => $message,
        ]);

        $intervention = Intervention::create([
            'title' => $message,
            'description' => $this->extractMission($message),
            'type' => $this->extractType($message),
            'village' => $this->extractVillage($message),
            'date' => $email->date(),
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
