<?php

namespace Database\Seeders\TenantSeeders;

use Illuminate\Database\Seeder;
use Modules\Central\TenantSidebar\Models\TenantSidebar;
use Modules\System\Sidebar\Models\Sidebar;

class SidebarSeeder extends Seeder
{
    public function run(): void
    {
        $sidebarItems = config('tenantSidebar');

        foreach ($sidebarItems as $sidebarItem) {
            // parent
            $parent = Sidebar::updateOrCreate([
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
                Sidebar::updateOrCreate([
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
