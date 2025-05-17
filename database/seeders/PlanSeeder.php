<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\System\Plan\Models\Plan;

class PlanSeeder extends Seeder
{
    public function run(): void
    {
        // if (tenant()->domain == 'admin') {
        foreach (config('default-plans') as $planData) {
            Plan::firstOrCreate(
                [
                    'name->ar' => $planData['name']['ar'],
                    'name->en' => $planData['name']['en'],
                ],
                $planData
            );
        }
        // }
    }
}
