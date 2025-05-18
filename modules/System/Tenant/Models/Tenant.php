<?php

namespace Modules\System\Tenant\Models;

use Modules\Common\Enums\TenantCreateStatus;
use Modules\Common\Traits\Filterable;
use Modules\System\Plan\Models\Plan;
use Modules\System\Subscription\Models\Subscription;
use Spatie\Translatable\HasTranslations;
use Stancl\Tenancy\Contracts\TenantWithDatabase;
use Stancl\Tenancy\Database\Concerns\HasDatabase;
use Stancl\Tenancy\Database\Concerns\HasDomains;
use Stancl\Tenancy\Database\Models\Tenant as BaseTenant;

class Tenant extends BaseTenant implements TenantWithDatabase
{
    use Filterable, HasDatabase, HasDomains, HasTranslations;

    protected $connection = 'admin';

    // protected $fillable = [];
    protected $guarded = [];

    protected $translatable = ['company_name'];

    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }

    protected $casts = [
        'creating_status' => TenantCreateStatus::class,
    ];

    //relations
    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }

    public function currentSubscription()
    {
        return $this->hasOne(Subscription::class)->where('status', 'active');
    }


    // custom columns for tenancy for laravel
    public static function getCustomColumns(): array
    {
        return [
            'id',
            'company_name',
            'user_id',
            'domain',
            'is_active',
            'version',
            'creating_status',
            'plan_id',
            'deleted_at',
        ];
    }
}
