<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Central\Tenant\Models\Tenant;
use Modules\Common\Enums\TenantCreateStatus;

class AdminCompanySeeder extends Seeder
{
    public function run(): void
    {
        $tenant = Tenant::updateOrCreate(
            ['company_name' => 'admin'],
            [
                'id' => 1,
                'company_name' => 'admin',
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
