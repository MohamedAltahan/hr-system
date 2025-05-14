<?php

namespace Database\Seeders\TenantSeeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Modules\Common\Enums\UserRoleEnum;
use Modules\System\Position\Models\Position;
use Modules\System\User\Models\User;

class PositionSeeder extends Seeder
{
    public function run(): void
    {
        $positions = config('employee-positions');

        foreach ($positions as $position) {
            Position::updateOrCreate(
                ['id' => $position['id']],
                [
                    'name' => $position['name'],
                ]
            );
        }
    }
}
