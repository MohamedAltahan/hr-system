<?php

namespace Database\Seeders\TenantSeeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Modules\Common\Enums\UserRoleEnum;
use Modules\Erp\User\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'id' => 1,
            'name_en' => 'admin',
            'name_ar' => 'ادمن',
            'username' => 'admin',
            'branch_id' => 1,
            'role' => UserRoleEnum::SuperAdmin,
            'email' => 'admin@example.com',
            'password' => Hash::make('admin'),
        ]);
    }
}
