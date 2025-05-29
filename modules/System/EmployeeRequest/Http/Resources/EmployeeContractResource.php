<?php

namespace Modules\System\EmployeeContract\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Common\Traits\HasPagination;
use Modules\System\User\Http\Resources\UserResource;

class EmployeeContractResource extends JsonResource
{
    use HasPagination;

    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'employee' => [
                'id' => $this->employee->id,
                'name' => $this->employee->name,
                'number' =>  $this->employee->employee_number,
                'department' => $this->employee->department?->name,
                'job_title' => $this->employee->jobTitle?->name,
            ],
            'attendance_rule' => [
                'id' => $this->attendanceRule->id,
                'name' => $this->attendanceRule->name,
            ],
            'salary' => $this->salary,
            'start_date' => formatDate($this->start_date),
            'end_date' => formatDate($this->end_date),
            'is_active' => $this->is_active,
        ];
    }
}
