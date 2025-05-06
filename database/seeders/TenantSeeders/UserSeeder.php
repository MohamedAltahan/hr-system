<?php

namespace Database\Seeders\TenantSeeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Modules\Common\Enums\UserRoleEnum;
use Modules\System\User\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // for owner only
        if (DB::getDatabaseName() == config('app.name') . '_admin') {
            User::firstOrcreate(['role' => UserRoleEnum::OWNER], [
                'id' => 1,
                'name' => ['en' => 'admin user', 'ar' => 'مستخدم ادمن'],
                'username' => 'admin',
                'branch_id' => 1,
                'role' => UserRoleEnum::OWNER,
                'email' => 'admin@example.com',
                'password' => Hash::make('123456789'),
            ]);
        } else {
            // super admin for all tenants
            User::firstOrcreate(['role' => UserRoleEnum::SuperAdmin], [
                'id' => 1,
                'name' => ['en' => 'admin user', 'ar' => 'مستخدم ادمن'],
                'username' => 'admin',
                'branch_id' => 1,
                'role' => UserRoleEnum::SuperAdmin,
                'email' => 'admin@example.com',
                'password' => Hash::make('admin'),
            ]);
        }
    }
}
