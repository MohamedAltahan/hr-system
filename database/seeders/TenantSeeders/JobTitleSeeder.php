<?php

namespace Database\Seeders\TenantSeeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Modules\Common\Enums\UserRoleEnum;
use Modules\System\JobTitle\Models\JobTitle;
use Modules\System\User\Models\User;

class JobTitleSeeder extends Seeder
{
    public function run(): void
    {
        $jobTitles = config('employee-job-titles');

        foreach ($jobTitles as $jobTitle) {

            JobTitle::updateOrCreate(
                ['id' => $jobTitle['id']],
                [
                    'name' => $jobTitle['name'],
                ]
            );
        }
    }
}
