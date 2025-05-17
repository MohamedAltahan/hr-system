<?php

namespace Modules\System\Plan\Models;

use Modules\Common\Models\BaseModel;

class Plan extends BaseModel
{
    public $translatable = ['name', 'description', 'features', 'currency'];

    protected $fillable = [
        'name',
        'description',
        'price',
        'price_after_discount',
        'is_active',
        'is_popular',
        'interval',
        'features',
        'limits',
        'permissions',
        'sidebar_items',
        'plan_id',
        'order',
        'currency',
        'is_trial',
        'trial_days',
        'duration_in_months',
        'tenant_id',
        'is_deletable',
    ];

    protected $casts = [
        'limits' => 'array',
        'permissions' => 'array',
        'sidebar_items' => 'array',
    ];
}
