# Laravel WebSockets Restart

This adds a console command to restart the [Laravel WebSocket](https://github.com/beyondcode/laravel-websockets) server.

Helpful if you deploy automatically (e.g. with Laravel Envoyer).

## Installation

```
composer require zaxxo/laravel-websockets-restart
```

## Usage

```
php artisan websockets:restart
```

## Note

This only works if the server is automatically restarted with Supervisor or something else.
