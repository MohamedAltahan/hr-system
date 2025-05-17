<?php

namespace Database\Seeders\TenantSeeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Modules\Common\Enums\UserRoleEnum;
use Modules\System\Position\Models\Position;
use Modules\System\Setting\Models\Setting;
use Modules\System\User\Models\User;

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
