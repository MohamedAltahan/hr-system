<?php

namespace Database\Seeders\TenantSeeders;

use Illuminate\Database\Seeder;
use Modules\System\Branch\Models\Branch;

class BranchSeeder extends Seeder
{
    public function run(): void
    {
        Branch::firstOrcreate(
            ['id' => 1],
            [
                'id' => 1,
                'name_en' => 'main branch',
                'name_ar' => 'الفرع الرئيسي',
                'is_active' => 1,
                'description' => ['en' => 'main branch', 'ar' => 'الفرع الرئيسي'],
                'address' => ['en' => 'main branch', 'ar' => 'الفرع الرئيسي'],
                'phone' => '01000000000',
            ]
        );
    }
}
