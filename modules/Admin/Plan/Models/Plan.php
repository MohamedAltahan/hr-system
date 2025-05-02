<?php

namespace Modules\Admin\Plan\Models;

use Modules\Common\Models\BaseModel;

class Plan extends BaseModel
{
    public $translatable = ['name', 'description', 'features'];

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
    ];

    protected $casts = [
        'features' => 'array',
        'limits' => 'array',
        'permissions' => 'array',
        'sidebar_items' => 'array',
        'name' => 'array',
    ];
}
