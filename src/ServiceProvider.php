<?php

namespace Zaxxo\LaravelWebSocketsRestart;

use BeyondCode\LaravelWebSockets\Console\StartWebSocketServer;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;

/**
 * Service provider for Laravel WebSockets Restart package.
 *
 * @package Zaxxo\LaravelWebSocketsRestart
 * @internal
 */
class ServiceProvider extends BaseServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {
        $this->app->alias(StartWebSocketCommand::class, StartWebSocketServer::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->commands(RestartWebSocketCommand::class);
    }
}
