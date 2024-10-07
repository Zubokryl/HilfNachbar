<?php

return [
    'defaults' => [
        'guard' => env('AUTH_GUARD', 'web'),
        'passwords' => env('AUTH_PASSWORD_BROKER', 'users'),
    ],

    'guards' => [
        'consumer' => [
            'driver' => 'session',
            'provider' => 'consumers',
        ],
        'provider' => [
            'driver' => 'session',
            'provider' => 'providers',
        ],
    ],

    'providers' => [
        'consumers' => [
            'driver' => 'eloquent',
            'model' => App\Models\Consumer::class,
        ],
        'providers' => [
            'driver' => 'eloquent',
            'model' => App\Models\Provider::class,
        ],
    ],

   'passwords' => [
    'consumers' => [
        'provider' => 'consumers',
        'table' => env('AUTH_PASSWORD_RESET_TOKEN_TABLE', 'password_reset_tokens'),
        'expire' => 60,
        'throttle' => 60,
    ],
    'providers' => [
        'provider' => 'providers',
        'table' => env('AUTH_PASSWORD_RESET_TOKEN_TABLE', 'password_reset_tokens'),
        'expire' => 60,
        'throttle' => 60,
    ],
],

    'password_timeout' => env('AUTH_PASSWORD_TIMEOUT', 10800),
];