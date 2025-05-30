<?php

namespace Database\Seeders\TenantSeeders;

use Illuminate\Database\Seeder;
use Modules\System\Department\Models\Department;

class DepartmentSeeder extends Seeder
{
    public function run(): void
    {
        $departments = config('employee-departments');

        foreach ($departments as $department) {

            Department::firstOrCreate(
                ['id' => $department['id']],
                [
                    'name' => $department['name'],
                    'description' => $department['description'],
                    'manager_id' => $department['manager_id'],
                ]
            );
        }
    }
}
