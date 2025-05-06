<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Modules\System\Plan\Models\Plan;

class PlanSeeder extends Seeder
{
    public function run(): void
    {
        Plan::firstOrCreate([
            'name' => [
                'en' => 'Basic',
                'ar' => 'أساسي',
            ],
            'description' => [
                'en' => 'Basic plan for small teams',
                'ar' => 'خطة أساسية للفرق الصغيرة',
            ],
            'price' => 99.99,
            'price_after_discount' => 79.99,
            'currency' => [
                'en' => 'SAR',
                'ar' => 'ريال سعودي',
            ],
            'is_active' => true,
            'is_popular' => false,
            'features' => [
                'ar' => [
                    'Feature ar 1',
                    'Feature ar 2',
                    'Feature ar 3',
                ],
                'en' => [
                    'Feature 1',
                    'Feature 2',
                    'Feature 3',
                ]
            ],
            'is_trial' => true,
            'trial_days' => 14,
            'duration_in_months' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
