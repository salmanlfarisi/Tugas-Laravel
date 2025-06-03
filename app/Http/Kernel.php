<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    protected $middleware = [
        // middleware global
    ];

    protected $middlewareGroups = [
        'web' => [
            // middleware untuk web
        ],

        'api' => [
            'throttle:api',
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],
    ];

    protected $routeMiddleware = [
    'admin' => \App\Http\Middleware\AdminMiddleware::class,
];

}
