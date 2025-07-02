<?php

namespace Modules\System\MyService\FinancialProfile\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Common\Enums\StatusCodeEnum;
use Modules\Common\Http\Controllers\ApiController;
use Modules\Common\Traits\ApiResponse;
use Modules\Common\Traits\UploadFile;
use Modules\System\MyService\FinancialProfile\Http\Resources\FinancialProfileResource;
use Modules\System\Salary\FinancialTransaction\Models\FinancialTransaction;

class MyFinancialProfileController extends ApiController
{
    use ApiResponse, UploadFile;

    public function show(Request $request)
    {
        $user = $request->user();
        $financialTransactions = FinancialTransaction::where('employee_id', $user->id)->latest()->get();

        return $this->sendResponse(
            FinancialProfileResource::paginate($financialTransactions),
            __('Data fetched successfully'),
            StatusCodeEnum::Success->value
        );
    }
}
