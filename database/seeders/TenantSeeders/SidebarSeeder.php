<?php

namespace Database\Seeders\TenantSeeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Modules\System\Sidebar\Models\Sidebar;

class SidebarSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Sidebar::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $sidebarItems = config('sidebar');

        foreach ($sidebarItems as $sidebarItem) {

            //check if this item is for owner only
            if (
                $sidebarItem['visible_for_owner_only'] === 1 &&
                tenant()->domain != 'admin'
            ) {
                continue;
            }

            // parent
            $parent = Sidebar::updateOrCreate(
                ['slug' => $sidebarItem['slug'], 'parent_id' => null],
                [
                    'name' => $sidebarItem['name'],
                    'slug' => $sidebarItem['slug'],
                    'route' => $sidebarItem['route'],
                    'parent_id' => null,
                    'icon' => $sidebarItem['icon'],
                    'permission_name' => $sidebarItem['permission_name'],
                    'is_active' => $sidebarItem['is_active'] ?? 1,
                    'order' => $sidebarItem['order'],
                ]
            );
            // children
            foreach ($sidebarItem['children'] as $child) {
                Sidebar::updateOrCreate(
                    ['slug' => $child['slug'], 'parent_id' => $parent->id],
                    [
                        'name' => $child['name'],
                        'slug' => $child['slug'],
                        'route' => $child['route'],
                        'parent_id' => $parent->id,
                        'icon' => $child['icon'],
                        'permission_name' => $child['permission_name'],
                        'is_active' => $child['is_active'] ?? 1,
                        'order' => $child['order'],
                    ]
                );
            }
        }
    }
}
