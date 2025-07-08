<?php

namespace Modules\System\Salary\SalaryStructure\Http\Requests;

use Illuminate\Validation\Rule;
use Modules\Common\Http\Requests\ApiRequest;

class SalaryStructureRequest extends ApiRequest
{
    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('salary_structures', 'name')->ignore($this->route('salary_structure')),

            ],
        ];
    }
}
