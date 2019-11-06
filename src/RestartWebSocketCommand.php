<?php

namespace Zaxxo\LaravelWebSocketsRestart;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\InteractsWithTime;

/**
 * Command for restarting WebSocket server.
 *
 * @package Zaxxo\LaravelWebSocketsRestart
 * @internal
 */
class RestartWebSocketCommand extends Command
{
    use InteractsWithTime;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'websockets:restart';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Restart WebSocket server';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Cache::forever('beyondcode:websockets:restart', $this->currentTime());

        $this->info('Broadcasting WebSocket server restart signal.');
    }
}
