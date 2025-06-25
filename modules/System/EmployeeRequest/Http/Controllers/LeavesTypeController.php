<?php

namespace Modules\System\EmployeeRequest\Http\Controllers;

use Modules\Common\Enums\StatusCodeEnum;
use Modules\Common\Traits\ApiResponse;
use Modules\System\EmployeeRequest\Enum\EmployeeRequestTypeEnum;
use Modules\System\EmployeeRequest\Enum\LeavesTypeEnum;
use Modules\System\Leaves\Leaves\Models\Leaves;

class LeavesTypeController
{
    use ApiResponse;

    public function __invoke()
    {
        $date = collect(LeavesTypeEnum::cases())->mapWithKeys(function ($case) {
            return [$case->value => __("{$case->value}")];
        })->all();

        return $this->sendResponse(
            $date,
            __('Data fetched successfully'),
            StatusCodeEnum::Success->value
        );
    }
}
