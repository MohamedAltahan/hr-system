<?php

namespace Modules\System\EmployeeContract\Http\Requests;

use Modules\Common\Http\Requests\ApiRequest;

class EmployeeContractRequest extends ApiRequest
{
    public function rules(): array
    {
        return [
            'employee_id' => 'required|exists:users,id',
            'attendance_rule_id' => 'required|exists:attendance_rules,id',
            'salary' => 'required|numeric|min:0|max:99999999',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'is_active' => ['required', 'boolean'],
        ];
    }
}
