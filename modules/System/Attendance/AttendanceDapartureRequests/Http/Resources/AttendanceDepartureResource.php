<?php

namespace Modules\System\Attendance\AttendanceDeparture\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Common\Traits\HasPagination;

class AttendanceDepartureResource extends JsonResource
{
    use HasPagination;

    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'empoloyee' => [
                'id' => $this->employee->id,
                'name' => $this->employee->name,
            ],
            'date' => formatDate($this->date),
            'check_in' => formatTime($this->check_in),
            'check_out' => formatTime($this->check_out),
        ];
    }
}
