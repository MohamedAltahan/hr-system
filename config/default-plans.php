<?php

return [
    [
        'order' => 1,
        'name' => [
            'en' => 'Trial',
            'ar' => 'تجربية',
        ],
        'tenant_id' => null,
        'description' => [
            'en' => 'trial plan for test',
            'ar' => 'خطة تجريبية للاختبار',
        ],
        'price' => 0,
        'price_after_discount' => 0,
        'currency' => [
            'en' => 'SAR',
            'ar' => 'ريال سعودي',
        ],
        'is_active' => true,
        'is_popular' => false,
        'features' => [
            'ar' => [
                'Feature ar 1',
                'Feature ar 2',
                'Feature ar 3',
            ],
            'en' => [
                'Feature en  1',
                'Feature en  2',
                'Feature en  3',
            ],
        ],
        'is_trial' => 1,
        'trial_days' => 15,
        'duration_in_months' => 0,
    ],
    [
        'order' => 2,
        'name' => [
            'en' => 'Basic',
            'ar' => 'أساسي',
        ],
        'tenant_id' => null,
        'description' => [
            'en' => 'Basic plan for small teams',
            'ar' => 'خطة أساسية للفرق الصغيرة',
        ],
        'price' => 99.99,
        'price_after_discount' => 79.99,
        'currency' => [
            'en' => 'SAR',
            'ar' => 'ريال سعودي',
        ],
        'is_active' => true,
        'is_popular' => false,
        'features' => [
            'ar' => [
                'Feature ar 1',
                'Feature ar 2',
                'Feature ar 3',
            ],
            'en' => [
                'Feature en  1',
                'Feature en  2',
                'Feature en  3',
            ],
        ],
        'is_trial' => 0,
        'trial_days' => 0,
        'duration_in_months' => 1,
    ],

];
