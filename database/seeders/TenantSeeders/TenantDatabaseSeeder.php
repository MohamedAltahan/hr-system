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
                PositionSeeder::class,
                JobTitleSeeder::class,
                UserSeeder::class,
                DepartmentSeeder::class,
                SettingSeeder::class,
                SalaryStructureSeeder::class,
                // PlanSeeder::class,
            ]
        );
    }
}
