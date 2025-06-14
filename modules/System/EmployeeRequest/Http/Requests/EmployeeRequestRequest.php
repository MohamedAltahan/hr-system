<?php

namespace Modules\System\EmployeeRequest\Http\Requests;

use Illuminate\Validation\Rule;
use Modules\Common\Http\Requests\ApiRequest;
use Modules\System\EmployeeRequest\Enum\EmployeeRequestStatusEnum;
use Modules\System\EmployeeRequest\Enum\EmployeeRequestTypeEnum;

class EmployeeRequestRequest extends ApiRequest
{
    protected function prepareForValidation(): void
    {
        if (! $this->has('status') || $this->input('status') == null) {
            $this->merge([
                'status' => EmployeeRequestStatusEnum::PENDING->value,
            ]);
        }
    }

    public function rules(): array
    {
        return [
            'employee_id' => 'required|exists:users,id',
            'reason' => 'nullable|string',
            'type' => ['required', 'string', Rule::in(EmployeeRequestTypeEnum::cases())],
            'loan_amount' => 'nullable|numeric|min:0|max:99999999',
            'from_date' => 'required|date',
            'to_date' => 'required|date',
            'file_path' => 'nullable|string',
            'status' => ['nullable', 'string', Rule::in(EmployeeRequestStatusEnum::cases())],
            'manager_comment' => 'nullable|string',
            'reviewed_by' => 'nullable|exists:users,id',
            'reviewed_at' => 'nullable|date',
        ];
    }
}
