<?php

return [
    [
        'name' => ['ar' => '', 'en' => 'Genaral Settings'],
        'slug' => 'general_settings',
        'route' => '/general_settings',
        'icon' => 'settings',
        'permission_name' => 'view_general_settings',
        'order' => 1,
        'is_active' => 1,
        'children' => [
            [
                'name' => ['ar' => 'الفروع', 'en' => 'Branches'],
                'slug' => 'branches',
                'route' => '/branches',
                'icon' => 'branches',
                'permission_name' => 'view_branch',
                'order' => 1,
                'is_active' => 1,
            ],
        ],
    ],

];
