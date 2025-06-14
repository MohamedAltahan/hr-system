<?php

namespace Database\Seeders\TenantSeeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Modules\System\User\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // for owner only
        if (tenant()->domain == 'owner') {
            User::firstOrcreate(
                ['username' => 'owner'],
                [
                    'id' => 1,
                    'name' => ['en' => 'owner', 'ar' => 'المالك'],
                    'username' => 'owner',
                    'branch_id' => 1,
                    'is_owner' => 1,
                    'position_id' => 1,
                    'is_super_admin' => 1,
                    'email' => 'owner@alkholoudhr.com',
                    'password' => Hash::make('123456789'),
                ]
            );
        } else {
            // super admin for all other tenants
            User::firstOrcreate(
                ['username' => 'admin'],
                [
                    'id' => 1,
                    'name' => ['en' => 'admin user', 'ar' => 'مستخدم ادمن'],
                    'username' => 'admin',
                    'branch_id' => 1,
                    'position_id' => 1,
                    'is_owner' => 0,
                    'is_super_admin' => 1,
                    'email' => 'admin@example.com',
                    'password' => Hash::make('admin'),
                ]
            );
        }
    }
}
