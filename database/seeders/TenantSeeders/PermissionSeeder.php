<?php

namespace Database\Seeders\TenantSeeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Modules\Common\Enums\GuardEnum;
use Modules\System\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    public function run(): void
    {

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Permission::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $sidebarPermissions = $this->getSidebarPermissions();
        $modelsPermissions = $this->getModelsPermissions();

        $permissions = $sidebarPermissions->merge($modelsPermissions);

        foreach ($permissions as $permission) {
            Permission::updateOrCreate(
                ['name' => $permission['name']],
                [
                    'name' => $permission['name'],
                    'title' => $permission['title'],
                    'group' => $permission['group'],
                    'guard_name' => GuardEnum::TENANTUSER->value,
                ]
            );
        }
    }

    private function translatePermissionTitle($key, $value): array
    {
        $title = [];
        foreach (config('app.supported_languages') as $locale) {
            $title[$locale] = trans("$key", [], $locale).' '.trans("$value", [], $locale);
        }

        return $title;
    }

    private function getModelsPermissions(): \Illuminate\Support\Collection
    {
        return collect(config('permissions'))
            ->flatMap(function ($values, $key) {
                return collect($values)->map(function ($value) use ($key) {
                    return [
                        'name' => "{$key}_{$value}",
                        'title' => $this->translatePermissionTitle($key, $value),
                        'group' => $value,
                    ];
                });
            })
            ->unique('name'); // prevent duplicates
    }

    private function getSidebarPermissions(): \Illuminate\Support\Collection
    {
        return collect(config('sidebar'))->flatMap(function ($item) {

            // check if this item is for owner only
            if ($item['visible_for_owner_only'] === 1 && tenant()->domain != 'admin') {
                return collect(); // skip
            }

            $parent = [
                'name' => $item['permission_name'],
                'title' => $item['name'],
                'group' => 'sidebar',
            ];

            $children = collect($item['children'] ?? [])
                ->map(fn ($entry) => [
                    'name' => $entry['permission_name'],
                    'title' => $entry['name'],
                    'group' => 'sidebar',
                ]);

            return collect([$parent])->merge($children);
        });
    }
}
