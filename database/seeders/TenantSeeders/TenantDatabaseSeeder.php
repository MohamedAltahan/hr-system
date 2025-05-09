<?php

namespace Database\Seeders\TenantSeeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class TenantDatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(
            [
                PermissionSeeder::class,
                SidebarSeeder::class,
                BranchSeeder::class,
                UserSeeder::class,
            ]
        );
    }
}
