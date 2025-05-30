<?php

namespace Modules\System\AttendanceRule\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Common\Traits\HasPagination;

class AttendanceRuleResource extends JsonResource
{
    use HasPagination;

    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'entry_time' => formatTime($this->entry_time),
            'exit_time' => formatTime($this->exit_time),
            'break_time' => formatTime($this->break_time),
            'grace_period_minutes' => $this->grace_period_minutes,
            'shift_time' => $this->shift_time,
            'work_type' => $this->work_type,
            'weekly_days_count' => $this->weekly_days_count,
            'branch' => $this->branch->name,
            'status' => $this->status,
        ];
    }
}
