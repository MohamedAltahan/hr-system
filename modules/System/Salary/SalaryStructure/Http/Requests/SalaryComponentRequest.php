<?php

namespace Modules\System\Salary\SalaryStructure\Http\Requests;

use Illuminate\Validation\Rule;
use Modules\Common\Http\Requests\ApiRequest;

class SalaryComponentRequest extends ApiRequest
{
    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('salary_components', 'name')->ignore($this->route('salary_component')),
            ],
            'type' => 'required|in:allowance,deduction',
            'is_taxable' => 'required|boolean',
        ];
    }
}
