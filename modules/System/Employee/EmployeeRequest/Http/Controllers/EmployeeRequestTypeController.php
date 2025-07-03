<?php

namespace Modules\System\Employee\EmployeeRequest\Http\Controllers;

use Modules\Common\Enums\StatusCodeEnum;
use Modules\Common\Traits\ApiResponse;
use Modules\System\Employee\EmployeeRequest\Enum\EmployeeRequestTypeEnum;

class EmployeeRequestTypeController
{
    use ApiResponse;

    public function __invoke()
    {
        $date = collect(EmployeeRequestTypeEnum::cases())->mapWithKeys(function ($case) {
            return [$case->value => __("{$case->value}")];
        })->all();

        return $this->sendResponse(
            $date,
            __('Data fetched successfully'),
            StatusCodeEnum::Success->value
        );
    }
}
