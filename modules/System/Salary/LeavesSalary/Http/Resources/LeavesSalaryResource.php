<?php

namespace Modules\System\Salary\LeavesSalary\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;
use Modules\Common\Traits\HasPagination;

class LeavesSalaryResource extends JsonResource
{
    use HasPagination;

    public function toArray(Request $request): array
    {
        // $startTime = Carbon::parse($this->start_time);
        // $endTime = Carbon::parse($this->end_time);

        return [
            'id' => $this->id,
            'empoloyee' => [
                'id' => $this->employee->id,
                'name' => $this->employee->name,
                'number' => $this->employee->employee_number,
                'department' => $this->employee->department?->name,
                'employment_type' => $this->employee->attendanceRule?->work_type->label(),
                'salary' => $this->employee->salary,
            ],
            'manager' => $this->reviewedBy?->name,
            'reason' => $this->reason,
            'approved_at' => formatDate($this->approved_at),
            // 'overtime_hours' => $startTime->diffInHours($endTime),
            // 'start_time' => formatTime($this->start_time),
            // 'end_time' => formatTime($this->end_time),
            'status' => $this->status,
            'duration_in_hours' => $this->duration_in_hours,
            'amount' => $this->amount,
        ];
    }
}
