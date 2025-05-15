<?php

namespace App\Http;

use App\Http\Middleware\RoleMiddleware;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    protected $middleware = [
        // global middleware di sini
    ];

    protected $middlewareGroups = [
        'web' => [
            // middleware grup web
        ],

        'api' => [
            'throttle:api',
            'bindings',
        ],
    ];

    protected $routeMiddleware = [
        // 'auth' => \App\Http\Middleware\Authenticate::class,
        // ... middleware lain ...
        'role' => \App\Http\Middleware\RoleMiddleware::class,  // tambahkan ini
    ];
}
