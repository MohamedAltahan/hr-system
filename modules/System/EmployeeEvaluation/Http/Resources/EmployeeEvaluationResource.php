<?php

namespace Modules\System\EmployeeEvaluation\Http\Resources;

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
            'employee_name' => $this->employee->name,
            'employee_number' => $this->employee->employee_number ?? '-',
            'evaluation_from' => $this->evaluation_from,
            'evaluation_to' => $this->evaluation_to,
            'score' => $this->score,
            'evaluator' => $this->evaluator?->name,
        ];
    }
}
