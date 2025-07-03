<?php

namespace Database\Seeders\TenantSeeders;

use Illuminate\Database\Seeder;
use Modules\System\Employee\JobTitle\Models\JobTitle;

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
