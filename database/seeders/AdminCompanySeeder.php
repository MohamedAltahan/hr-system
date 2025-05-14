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
            ['domain' => 'admin'],
            [
                'tenancy_db_name' => config('app.name').'_'.'admin',
                'company_name' => ['ar' => 'ادمن', 'en' => 'admin'],
                'domain' => 'admin',
                'is_active' => 1,
                'version' => config('app.version'),
                'plan_id' => null,
                'creating_status' => TenantCreateStatus::CREATED,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

        $tenant->domains()->updateOrCreate(
            ['domain' => 'admin'],
            [
                'domain' => 'admin',
                'tenant_id' => $tenant->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    }
}
