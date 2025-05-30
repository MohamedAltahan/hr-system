<?php

namespace Modules\System\Plan\Models;

use Modules\Common\Models\BaseModel;
use Modules\System\Subscription\Enum\SubscriptionStatus;
use Modules\System\Subscription\Models\Subscription;

class Plan extends BaseModel
{
    public $translatable = ['name', 'description', 'features', 'currency'];

    protected $connection = 'central';

    protected $fillable = [
        'id',
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
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'limits' => 'array',
        'permissions' => 'array',
        'sidebar_items' => 'array',
    ];

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }

    public function getCurrentActiveSubscriptionAttribute()
    {
        return tenancy()->central(function () {
            return Subscription::where('status', SubscriptionStatus::ACTIVE->value)
                ->where('plan_data->id', $this->id)
                ->where('tenant_id', $this->tenant_id)
                ->first();
        });
    }
}
