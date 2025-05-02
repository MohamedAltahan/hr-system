<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Modules\Admin\Admin\Models\Admin;
use Modules\Common\Enums\UserRoleEnum;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        Admin::create([
            'id' => 1,
            'name_en' => 'admin',
            'name_ar' => 'ادمن',
            'username' => 'admin',
            'role' => UserRoleEnum::SuperAdmin,
            'email' => 'admin@example.com',
            'password' => Hash::make('admin'),
        ]);
    }
}
