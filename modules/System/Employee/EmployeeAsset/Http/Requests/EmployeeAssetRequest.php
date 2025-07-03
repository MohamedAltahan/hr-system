<?php

namespace Modules\System\Employee\EmployeeAsset\Http\Requests;

use Illuminate\Validation\Rule;
use Modules\Common\Http\Requests\ApiRequest;
use Modules\System\Employee\EmployeeAsset\Enum\EmployeeAssetStatusEnum;

class EmployeeAssetRequest extends ApiRequest
{
    public function rules(): array
    {
        return [
            'employee_id' => 'required|exists:users,id',
            'manager_id' => 'required|exists:users,id',
            'employee_asset_type_id' => 'required|exists:employee_asset_types,id',
            'department_id' => 'required|exists:departments,id',
            'issue_date' => 'required|date',
            'return_date' => 'sometimes|nullable|date',
            'status' => ['required', Rule::in(EmployeeAssetStatusEnum::cases())],
        ];
    }
}
