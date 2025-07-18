<?php

namespace Modules\System\MyService\EvaluationProfile\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Common\Enums\StatusCodeEnum;
use Modules\Common\Http\Controllers\ApiController;
use Modules\Common\Traits\ApiResponse;
use Modules\Common\Traits\UploadFile;
use Modules\System\Employee\EmployeeEvaluation\Models\EmployeeEvaluation;
use Modules\System\MyService\EvaluationProfile\Http\Resources\EvaluationProfileResource;

class MyEvaluationProfileController extends ApiController
{
    use ApiResponse, UploadFile;

    public function index(Request $request)
    {
        $employee = $request->user();

        $financialTransactions = EmployeeEvaluation::with('employee', 'evaluator')
            ->where('employee_id', $employee->id)
            ->paginate($this->perPage);

        return $this->sendResponse(
            EvaluationProfileResource::paginate($financialTransactions),
            __('Data fetched successfully'),
            StatusCodeEnum::Success->value
        );
    }
}
