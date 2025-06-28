<?php

namespace Modules\System\EmployeeRequest\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Common\Traits\HasPagination;

use function Laravel\Prompts\form;

class EmployeeRequestResource extends JsonResource
{
    use HasPagination;

    public function toArray(Request $request): array
    {

        return [
            'id' => $this->id,
            'employee' => [
                'id' => $this->employee->id,
                'name' => $this->employee->name,
            ],
            'type' => [
                $this->type->value => $this->type->label(),
            ],
            'loan_amount' => $this->loan_amount,
            'from_date' => formatDate($this->from_date),
            'to_date' => formatDate($this->to_date),
            'reason' => $this->reason,
            'file_path' => $this->file_path,
            'status' => $this->status,
            'manager_comment' => $this->manager_comment,
            'reviewed_by' => [
                'id' => $this->reviewedBy?->id,
                'name' => $this->reviewedBy?->name,
            ],
            'reviewed_at' => formatDate($this->reviewed_at),
            'leave_type' => [
                $this->leave_type?->value => $this->leave_type?->label(),
            ],
            'time' => formatTime($this->time)

        ];
    }
}
