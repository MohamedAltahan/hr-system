<?php

namespace Modules\System\Attendance\DisciplinaryActions\Http\Controllers;

use Modules\Common\Enums\StatusCodeEnum;
use Modules\Common\Traits\ApiResponse;
use Modules\System\Attendance\DisciplinaryActions\Enum\DisciplinaryActionsEnum;
use Modules\System\EmployeeRequest\Enum\LeavesTypeEnum;

class DisciplinaryActionsListController
{
    use ApiResponse;

    public function __invoke()
    {
        $date = collect(DisciplinaryActionsEnum::cases())->mapWithKeys(function ($case) {
            return [$case->value => __("{$case->value}")];
        })->all();

        return $this->sendResponse(
            $date,
            __('Data fetched successfully'),
            StatusCodeEnum::Success->value
        );
    }
}
