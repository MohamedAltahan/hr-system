<?php

namespace Modules\System\MyService\FinancialProfile\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Common\Enums\StatusCodeEnum;
use Modules\Common\Http\Controllers\ApiController;
use Modules\Common\Traits\ApiResponse;
use Modules\Common\Traits\UploadFile;
use Modules\System\MyService\FinancialProfile\Http\Resources\FinancialProfileResource;
use Modules\System\Salary\Payslip\Models\Payslip;

class MyFinancialProfileController extends ApiController
{
    use ApiResponse, UploadFile;

    public function index(Request $request)
    {
        $employee = $request->user();

        $financialTransactions = Payslip::with('employee')->where('employee_id', $employee->id)->paginate($this->perPage);

        return $this->sendResponse(
            FinancialProfileResource::paginate($financialTransactions),
            __('Data fetched successfully'),
            StatusCodeEnum::Success->value
        );
    }
}
