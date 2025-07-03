<?php

namespace Modules\System\Employee\EmployeeEvaluation\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Common\Traits\HasPagination;

class EmployeeEvaluationResource extends JsonResource
{
    use HasPagination;

    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'evaluation_from' => $this->evaluation_from,
            'evaluation_to' => $this->evaluation_to,
            'score' => $this->score,
            'employee' => [
                'id' => $this->employee->id,
                'name' => $this->employee->name,
                'number' => $this->employee->employee_number ?? '-',
            ],
            'evaluator' => [
                'id' => $this->evaluator?->id,
                'name' => $this->evaluator?->name,
            ],
        ];
    }
}
