<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Admin\TenantSidebar\Models\TenantSidebar;

class TenantSidebarSeeder extends Seeder
{
    public function run(): void
    {
        $sidebarItems = config('tenantSidebar');

        foreach ($sidebarItems as $sidebarItem) {
            // parent
            $parent = TenantSidebar::updateOrCreate([
                'name' => $sidebarItem['name'],
                'slug' => $sidebarItem['slug'],
                'route' => $sidebarItem['route'],
                'parent_id' => null,
                'icon' => $sidebarItem['icon'],
                'is_active' => $sidebarItem['is_active'] ?? 1,
                'order' => $sidebarItem['order'],
            ]);
            // children
            foreach ($sidebarItem['children'] as $child) {
                TenantSidebar::updateOrCreate([
                    'name' => $child['name'],
                    'slug' => $child['slug'],
                    'route' => $child['route'],
                    'parent_id' => $parent->id,
                    'icon' => $child['icon'],
                    'is_active' => $child['is_active'] ?? 1,
                    'order' => $child['order'],
                ]);
            }
        }
    }
}
