<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * @var array
     */
    protected $middleware = [
        \App\Http\Middleware\CorsMiddleware::class, // Ваш кастомный CORS middleware
        
        \Illuminate\Http\Middleware\TrustHosts::class, // Доверие к хостам
        \Illuminate\Http\Middleware\TrustProxies::class, // Обработка доверенных прокси-серверов
        \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class, // Проверка размера POST-запросов
         \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class, // Преобразование пустых строк в null
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array
     */
    protected $middlewareGroups = [
        'web' => [
            // ...
        ],

        'api' => [
            \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class, // Добавляем здесь
            'throttle:api',
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],
    ];

    /**
     * The application's route middleware.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'auth' => \App\Http\Middleware\Authenticate::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'bindings' => \Illuminate\Routing\Middleware\SubstituteBindings::class,
        // ...
    ];
}