<?php

namespace Zaxxo\LaravelWebSocketsRestart;

use BeyondCode\LaravelWebSockets\Console\StartWebSocketServer;
use Illuminate\Support\Facades\Cache;

/**
 * Extend the command to start the WebSocket server.
 *
 * @package Zaxxo\LaravelWebSocketsRestart
 * @internal
 */
class StartWebSocketCommand extends StartWebSocketServer
{
    /**
     * The last time restart was requested.
     *
     * @var int
     */
    private $lastRestart;

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->configureRestartTimer();

        parent::handle();
    }

    /**
     * Add a timer to check if server should be restarted.
     */
    protected function configureRestartTimer(): void
    {
        $this->lastRestart = $this->getLastRestart();

        $this->loop->addPeriodicTimer(10, function () {
            if ($this->getLastRestart() != $this->lastRestart) {
                $this->loop->stop();
            }
        });
    }

    /**
     * Get the last restart time.
     *
     * @return int
     */
    private function getLastRestart(): int
    {
        return Cache::get('beyondcode:websockets:restart', 0);
    }
}
