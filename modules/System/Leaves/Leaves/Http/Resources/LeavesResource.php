<?php

namespace Modules\System\Leaves\Leaves\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;
use Modules\Common\Traits\HasPagination;

class LeavesResource extends JsonResource
{
    use HasPagination;

    public function toArray(Request $request): array
    {
        $startDate = Carbon::parse($this->from_date);
        $endDate = Carbon::parse($this->to_date);

        return [
            'id' => $this->id,
            'empoloyee' => [
                'id' => $this->employee->id,
                'name' => $this->employee->name,
                'number' => $this->employee->employee_number,
                'department' => $this->employee->department?->name,
            ],
            'leave_type' => [$this->leave_type?->value => $this->leave_type?->label()],
            'from_date' => formatDate($this->from_date),
            'to_date' => formatDate($this->to_date),
            'days' => $startDate->diffInDays($endDate),
            'status' => $this->status,
        ];
    }
}
