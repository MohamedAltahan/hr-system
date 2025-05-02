<?php

return [

    'defaults' => [
        'guard' => 'erp',
        'passwords' => 'erp',
    ],

    'guards' => [
        'admin_session' => [
            'driver' => 'session',
            'provider' => 'admins',
        ],
        'admin' => [
            'driver' => 'sanctum',
            'provider' => 'admins',
        ],

        'website_session' => [
            'driver' => 'session',
            'provider' => 'website-users',
        ],
        'website' => [
            'driver' => 'sanctum',
            'provider' => 'website-users',
        ],

        'erp_session' => [
            'driver' => 'session',
            'provider' => 'erp-users',
        ],
        'erp' => [
            'driver' => 'sanctum',
            'provider' => 'erp-users',
        ],
    ],

    'providers' => [

        'admins' => [
            'driver' => 'eloquent',
            'model' => Modules\Admin\Admin\Models\Admin::class,
        ],

        'erp-users' => [
            'driver' => 'eloquent',
            'model' => Modules\Erp\User\Models\User::class,
        ],

        'website-users' => [
            'driver' => 'eloquent',
            'model' => Modules\Website\User\Models\User::class,
        ],

    ],

    'passwords' => [
        'users' => [
            'provider' => 'website-users',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    'password_timeout' => 10800,

];
