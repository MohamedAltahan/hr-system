<?php

namespace Modules\System\Employee\EmployeeClearance\Http\Requests;

use Illuminate\Validation\Rule;
use Modules\Common\Http\Requests\ApiRequest;
use Modules\System\Employee\EmployeeClearance\Enum\EmployeeClearanceStatusEnum;

class EmployeeClearanceUpdateStatusRequest extends ApiRequest
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
            'status' => ['nullable', 'string', Rule::in(EmployeeClearanceStatusEnum::cases())],
        ];
    }
}
