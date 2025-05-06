<?php

namespace Modules\System\Tenant\Models;

use Modules\Common\Enums\TenantCreateStatus;
use Modules\Common\Traits\Filterable;
use Modules\Central\Plan\Models\Plan;
use Spatie\Translatable\HasTranslations;
use Stancl\Tenancy\Contracts\TenantWithDatabase;
use Stancl\Tenancy\Database\Concerns\HasDatabase;
use Stancl\Tenancy\Database\Concerns\HasDomains;
use Stancl\Tenancy\Database\Models\Tenant as BaseTenant;

class Tenant extends BaseTenant implements TenantWithDatabase
{
    use HasDatabase, HasDomains, HasTranslations, Filterable;

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
