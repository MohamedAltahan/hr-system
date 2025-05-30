<?php

namespace Database\Seeders\TenantSeeders;

use Illuminate\Database\Seeder;
use Modules\System\Setting\Models\Setting;

class SettingSeeder extends Seeder
{
    public function run(): void
    {
        $companySettings = config('company-settings');

        foreach ($companySettings as $setting) {
            Setting::firstOrCreate(
                ['key' => $setting['key']],
                $setting
            );
        }
    }
}
