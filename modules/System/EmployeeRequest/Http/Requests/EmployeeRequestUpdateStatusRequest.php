<?php

namespace Modules\System\EmployeeRequest\Http\Requests;

use Illuminate\Validation\Rule;
use Modules\Common\Http\Requests\ApiRequest;
use Modules\System\EmployeeRequest\Enum\EmployeeRequestStatusEnum;

class EmployeeRequestUpdateStatusRequest extends ApiRequest
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
            'status' => ['nullable', 'string', Rule::in(EmployeeRequestStatusEnum::cases())],
        ];
    }
}
