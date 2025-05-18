<?php

namespace Database\Seeders\TenantSeeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Modules\Common\Enums\UserRoleEnum;
use Modules\System\Department\Models\Department;
use Modules\System\JobTitle\Models\JobTitle;
use Modules\System\User\Models\User;

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
