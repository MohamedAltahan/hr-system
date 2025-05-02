<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Admin\TenantPermission\Models\TenantPermission;
use Modules\Common\Enums\GuardEnum;

class TenantPermissionSeeder extends Seeder
{
    public function run(): void
    {
        // $permissionNames = collect(config('tenantPermissions'))
        //     ->flatMap(fn($values, $key) => collect($values)->map(fn($value) => "{$key}_{$value}"))
        //     ->unique(); //prevent duplicates

        $permissions = collect(config('tenantPermissions'))
            ->flatMap(function ($values, $key) {
                return collect($values)->map(function ($value) use ($key) {
                    return [
                        'name' => "{$key}_{$value}",
                        'title' => $this->translatePermissionTitle($key, $value),
                    ];
                });
            })
            ->unique('name'); // prevent duplicates

        foreach ($permissions as $permission) {
            TenantPermission::updateOrCreate(
                ['name' => $permission['name']],
                [
                    'name' => $permission['name'],
                    'title' => $permission['title'],
                    'guard_name' => GuardEnum::ERP->value,
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
}
