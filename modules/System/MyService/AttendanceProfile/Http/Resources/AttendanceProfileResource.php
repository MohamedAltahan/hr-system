<?php

namespace Modules\System\MyService\AttendanceProfile\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;
use Modules\Common\Traits\HasPagination;

class AttendanceProfileResource extends JsonResource
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
                // 'number' => $this->employee->employee_number,
                // 'department' => $this->employee->department?->name,
            ],
            'date' => formatDate($this->date),
            'check_in' => formatTime($this->check_in),
            'check_out' => formatTime($this->check_out),
        ];
    }
}
