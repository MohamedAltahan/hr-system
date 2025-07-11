<?php

namespace Modules\System\MyService\AttendanceProfile\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Common\Enums\StatusCodeEnum;
use Modules\Common\Http\Controllers\ApiController;
use Modules\Common\Traits\ApiResponse;
use Modules\Common\Traits\UploadFile;
use Modules\System\Attendance\AttendanceDeparture\Models\AttendanceDeparture;
use Modules\System\Attendance\AttendanceRule\Models\AttendanceRule;
use Modules\System\MyService\AttendanceProfile\Http\Resources\AttendanceProfileResource;
use Modules\System\Salary\FinancialTransaction\Models\FinancialTransaction;
use Modules\System\Salary\Payslip\Models\Payslip;
use Modules\System\Salary\SalaryStructure\Services\SalaryCalculator;

class MyAttendanceProfileController extends ApiController
{
    use ApiResponse, UploadFile;

    public function index(Request $request)
    {
        $employee = $request->user();

        $financialTransactions = AttendanceDeparture::with('employee')->where('employee_id', $employee->id)->paginate($this->perPage);

        return $this->sendResponse(
            AttendanceProfileResource::paginate($financialTransactions),
            __('Data fetched successfully'),
            StatusCodeEnum::Success->value
        );
    }
}
