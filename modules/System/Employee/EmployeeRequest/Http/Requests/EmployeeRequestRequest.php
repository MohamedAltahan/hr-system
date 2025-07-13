<?php

namespace Modules\System\Employee\EmployeeRequest\Http\Requests;

use Illuminate\Validation\Rule;
use Modules\Common\Http\Requests\ApiRequest;
use Modules\System\Employee\EmployeeRequest\Enum\EmployeeRequestStatusEnum;
use Modules\System\Employee\EmployeeRequest\Enum\EmployeeRequestTypeEnum;
use Modules\System\Employee\EmployeeRequest\Enum\LeavesTypeEnum;

class EmployeeRequestRequest extends ApiRequest
{
    protected function prepareForValidation(): void
    {
        if (!$this->has('status') || $this->input('status') == null) {
            $this->merge([
                'status' => EmployeeRequestStatusEnum::PENDING->value,
            ]);
        }

        if (!$this->has('employee_id') || $this->input('employee_id') == null) {
            $this->merge([
                'employee_id' => request()->user()->id,
            ]);
        }
    }

    public function rules(): array
    {
        return [
            'employee_id' => 'required|exists:users,id',
            'reason' => 'nullable|string',
            'type' => ['required', 'string', Rule::in(EmployeeRequestTypeEnum::cases())],
            'leave_type' => ['nullable', 'string', Rule::in(LeavesTypeEnum::cases())],
            'loan_amount' => 'nullable|numeric|min:0|max:99999999',
            'from_date' => 'required|date',
            'to_date' => 'nullable|date',
            'file_path' => 'nullable|string',
            'status' => ['nullable', 'string', Rule::in(EmployeeRequestStatusEnum::cases())],
            'manager_comment' => 'nullable|string',
            'reviewed_by' => 'nullable|exists:users,id',
            'reviewed_at' => 'nullable|date',
            'time' => 'nullable|date_format:H:i',
        ];
    }
}
