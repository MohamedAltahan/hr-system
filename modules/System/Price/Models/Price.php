<?php

namespace Modules\System\Price\Models;

use Modules\Common\Models\BaseModel;
use Modules\System\Subscription\Enum\SubscriptionStatus;
use Modules\System\Subscription\Models\Subscription;

class Price extends BaseModel
{
    protected $connection = 'central';

    protected $fillable = [
        'id',
        'price',
        'price_after_discount',
        'currency_code',
        'duration_in_months',
        'tenant_id',
        'created_at',
        'updated_at',
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
