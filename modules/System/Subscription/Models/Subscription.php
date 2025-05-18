<?php

namespace Modules\System\Subscription\Models;

use Modules\Common\Models\BaseModel;
use Modules\System\Subscription\Enum\SubscriptionStatus;
use Modules\System\Tenant\Models\Tenant;

class Subscription extends BaseModel
{
    protected $fillable = [
        'tenant_id',
        'status',
        'start_date',
        'end_date',
        'cancel_date',
        'next_billing_at',
        'is_auto_renew',
        'plan_data',
    ];

    protected $casts = [
        'plan_data' => 'array',
        'status' => SubscriptionStatus::class,
    ];

    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }

    // public function transactions()
    // {
    //     return $this->hasMany(Transaction::class);
    // }
}
