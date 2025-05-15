<?php

namespace Modules\System\EmployeeEvaluation\Http\Requests;

use Illuminate\Validation\Rule;
use Modules\Common\Http\Requests\ApiRequest;

class EmployeeEvaluationRequest extends ApiRequest
{
    public function rules(): array
    {
        return [
            'employee_id' => 'required|exists:users,id',
            'evaluation_from' => 'required|date',
            'evaluation_to' => 'required|date',
            'score' => 'required|numeric|min:0|max:100',
            'evaluator_id' => 'required|exists:users,id',
        ];
    }
}
