<?php

namespace Modules\System\Salary\SalaryStructure\Http\Requests;

use Illuminate\Validation\Rule;
use Modules\Common\Http\Requests\ApiRequest;

class EmployeeSalaryRequest extends ApiRequest
{
    public function rules(): array
    {
        return [
            'salary_structure_id' => 'required|exists:salary_structures,id',
            'salary_component_id' => 'required|exists:salary_components,id',
            'value_type' => ['required', Rule::in(['fixed', 'percentage'])],
            'value' => 'required|numeric|min:0|max:99999999',
            'base_component_id' => 'nullable|exists:salary_components,id',
        ];
    }
}
