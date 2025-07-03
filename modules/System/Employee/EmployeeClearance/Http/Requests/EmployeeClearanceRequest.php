<?php

namespace Modules\System\Employee\EmployeeClearance\Http\Requests;

use Illuminate\Validation\Rule;
use Modules\Common\Http\Requests\ApiRequest;
use Modules\System\Employee\EmployeeClearance\Enum\EmployeeClearanceStatusEnum;

class EmployeeClearanceRequest extends ApiRequest
{
    protected function prepareForValidation(): void
    {
        if (! $this->has('status') || $this->input('status') == null) {
            $this->merge([
                'status' => EmployeeClearanceStatusEnum::PENDING->value,
            ]);
        }
    }

    public function rules(): array
    {
        return [
            'employee_id' => 'required|exists:users,id',
            'reason' => 'nullable|string',
            'last_working_day' => 'required|date',
            'status' => ['nullable', 'string', Rule::in(EmployeeClearanceStatusEnum::cases())],
            'notice_period' => 'nullable|integer',

        ];
    }
}
