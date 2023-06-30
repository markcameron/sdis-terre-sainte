<?php

namespace App\Console\Commands;

use App\Services\InterventionService;
use Illuminate\Console\Command;

class InterventionServiceDebug extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'intervention:parse {message}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Parse an Intervention mail text for debugging purposes';

    /**
     * Execute the console command.
     */
    public function handle(InterventionService $interventionService)
    {
        $message = $this->argument('message');

        $this->info($message);

        $this->info($interventionService->extractType($message));
        $this->info($interventionService->extractMission($message));
        $this->info($interventionService->extractVillage($message));
    }
}
