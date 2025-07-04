<?php

namespace Modules\System\Attendance\DisciplinaryActions\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Common\Traits\HasPagination;

class DisciplinaryActionsResource extends JsonResource
{
    use HasPagination;

    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'id' => $this->id,
            'empoloyee' => [
                'id' => $this->employee->id,
                'name' => $this->employee->name,
                'number' => $this->employee->employee_number,
                'department' => $this->employee->department?->name,
                'salary' => $this->employee->salary,
            ],
            'execution_date' => formatDate($this->execution_date),
            'amount' => $this->amount,
            'reason' => $this->reason,
            'status' => $this->status,
            'action_type' => $this->action_type,
        ];
    }
}
