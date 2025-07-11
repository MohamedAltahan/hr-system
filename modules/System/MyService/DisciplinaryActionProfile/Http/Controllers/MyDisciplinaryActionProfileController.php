<?php

namespace Modules\System\MyService\DisciplinaryActionProfile\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Common\Enums\StatusCodeEnum;
use Modules\Common\Http\Controllers\ApiController;
use Modules\Common\Traits\ApiResponse;
use Modules\Common\Traits\UploadFile;
use Modules\System\Attendance\DisciplinaryActions\Models\DisciplinaryActions;
use Modules\System\MyService\DisciplinaryActionProfile\Http\Resources\DisciplinaryActionProfileResource;

class MyDisciplinaryActionProfileController extends ApiController
{
    use ApiResponse, UploadFile;

    public function index(Request $request)
    {
        $employee = $request->user();

        $financialTransactions = DisciplinaryActions::with('employee')->where('employee_id', $employee->id)->paginate($this->perPage);

        return $this->sendResponse(
            DisciplinaryActionProfileResource::paginate($financialTransactions),
            __('Data fetched successfully'),
            StatusCodeEnum::Success->value
        );
    }
}
