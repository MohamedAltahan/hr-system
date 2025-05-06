<?php

namespace Modules\System\Tenant\Models;

use Modules\Common\Enums\TenantCreateStatus;
<<<<<<< HEAD
use Modules\Common\Traits\Filterable;
use Modules\Central\Plan\Models\Plan;
=======
use Modules\System\Plan\Models\Plan;
>>>>>>> 7cc13c58bca4d5cdede5152e70d8347d12241e80
use Spatie\Translatable\HasTranslations;
use Stancl\Tenancy\Contracts\TenantWithDatabase;
use Stancl\Tenancy\Database\Concerns\HasDatabase;
use Stancl\Tenancy\Database\Concerns\HasDomains;
use Stancl\Tenancy\Database\Models\Tenant as BaseTenant;

class Tenant extends BaseTenant implements TenantWithDatabase
{
<<<<<<< HEAD
    use HasDatabase, HasDomains, HasTranslations, Filterable;

    protected $connection = 'admin';
=======
    use HasDatabase, HasDomains, HasTranslations;
>>>>>>> 7cc13c58bca4d5cdede5152e70d8347d12241e80

    // protected $fillable = [];
    protected $guarded = [];

    protected $translatable = ['company_name'];

<<<<<<< HEAD
=======

>>>>>>> 7cc13c58bca4d5cdede5152e70d8347d12241e80
    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }

    protected $casts = [
<<<<<<< HEAD
        'creating_status' => TenantCreateStatus::class,
=======
        'creating_status' => TenantCreateStatus::class
>>>>>>> 7cc13c58bca4d5cdede5152e70d8347d12241e80
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
