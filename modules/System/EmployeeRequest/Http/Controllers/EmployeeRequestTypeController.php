<?php

namespace Modules\System\EmployeeRequest\Http\Controllers;

use Modules\Common\Enums\StatusCodeEnum;
use Modules\Common\Traits\ApiResponse;
use Modules\System\EmployeeRequest\Enum\EmployeeRequestTypeEnum;
use Modules\System\EmployeeRequest\Http\Resources\EmployeeRequestTypeListResource;

class EmployeeRequestTypeController
{
    use ApiResponse;

    public function __invoke()
    {
        $date  = collect(EmployeeRequestTypeEnum::cases())->mapWithKeys(function ($case) {
            return [$case->value => __("{$case->value}")];
        })->all();

        return $this->sendResponse(
            $date,
            __('Data fetched successfully'),
            StatusCodeEnum::Success->value
        );
    }
}
