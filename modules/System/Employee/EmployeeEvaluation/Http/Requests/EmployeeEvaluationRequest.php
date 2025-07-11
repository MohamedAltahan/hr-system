<?php

namespace Modules\System\Employee\EmployeeEvaluation\Http\Requests;

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
            'comment' => 'nullable|string|max:1000',
        ];
    }
}
