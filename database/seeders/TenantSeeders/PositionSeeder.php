<?php

namespace Database\Seeders\TenantSeeders;

use Illuminate\Database\Seeder;
use Modules\System\Position\Models\Position;

class PositionSeeder extends Seeder
{
    public function run(): void
    {
        $positions = config('employee-positions');

        foreach ($positions as $position) {
            Position::updateOrCreate(
                ['id' => $position['id']],
                [
                    'branch_id' => $position['branch_id'],
                    'name' => $position['name'],
                ]
            );
        }
    }
}
