<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Common\Enums\TenantCreateStatus;
use Modules\System\Tenant\Models\Tenant;

class AdminCompanySeeder extends Seeder
{
    public function run(): void
    {
        $tenant = Tenant::firstOrCreate(
            ['domain' => config('app.owner_domain')],
            [
                'tenancy_db_name' => config('app.name') . '_' . config('app.owner_domain'),
                'company_name' => ['ar' => 'المالك', 'en' => config('app.owner_domain')],
                'domain' => config('app.owner_domain'),
                'is_active' => 1,
                'version' => config('app.version'),
                'plan_id' => null,
                'creating_status' => TenantCreateStatus::CREATED,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

        $tenant->domains()->updateOrCreate(
            ['domain' => config('app.owner_domain')],
            [
                'domain' => config('app.owner_domain'),
                'tenant_id' => $tenant->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    }
}
