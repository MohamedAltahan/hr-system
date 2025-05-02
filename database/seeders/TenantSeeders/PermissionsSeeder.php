<?php

namespace Database\Seeders\TenantSeeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Modules\Common\Enums\GuardEnum;

class PermissionsSeeder extends Seeder
{
    public function run(): void
    {
        $tenantPlan = tenant()->plan_id;

        // Switch to central DB and fetch tenant plan
        $plan = DB::connection('admin')->table('plans')->where('id', $tenantPlan)->first();

        $permissions = json_decode($plan->permissions, true);
        $sidebarItems = json_decode($plan->sidebar_items, true);
        $limits = json_decode($plan->limits, true);

        // seed permissions
        foreach ($permissions as $permission) {
            // Insert into tenant's DB (you're already in tenant context when this seeder runs)
            DB::table('permissions')->insert([
                'name' => $permission['name'],
                'title' => json_encode($permission['title']),
                'guard_name' => GuardEnum::ERP->value,
                'group' => $permission['group'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // seed sidebar items
        foreach ($sidebarItems as $sidebarItem) {
            DB::table('sidebars')->insert([
                'name' => json_encode($sidebarItem['name']),
                'slug' => $sidebarItem['slug'],
                'route' => $sidebarItem['route'],
                'parent_id' => $sidebarItem['parent_id'],
                'icon' => $sidebarItem['icon'],
                'is_active' => $sidebarItem['is_active'],
                'order' => $sidebarItem['order'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // seed limits
        foreach ($limits as $resource => $limit) {
            DB::table('tenant_limits')->insert([
                'resource_type' => $resource,
                'max_count' => $limit,
                'current_count' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
