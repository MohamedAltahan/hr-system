<?php

return [

    'defaults' => [
        'guard' => 'tenant-users',
        'passwords' => 'tenant',
    ],

    'guards' => [
        'tenant-users' => [
            'driver' => 'sanctum',
            'provider' => 'tenant',
        ],
    ],

    'providers' => [
        'tenant' => [
            'driver' => 'eloquent',
            'model' => Modules\System\User\Models\User::class,
        ],
    ],

    'passwords' => [
        'users' => [
            'provider' => 'tenant',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    'password_timeout' => 10800,

];
