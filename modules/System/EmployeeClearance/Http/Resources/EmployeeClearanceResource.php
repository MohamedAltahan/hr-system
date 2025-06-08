<?php

namespace Modules\System\EmployeeClearance\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Common\Traits\HasPagination;
use Modules\System\User\Http\Resources\UserResource;

class EmployeeClearanceResource extends JsonResource
{
    use HasPagination;

    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'employee' => [
                'id' => $this->employee->id,
                'name' => $this->employee->name,
                'department' => $this->employee->department?->name,
                'asset' => $this->employee->asset,
            ],
            'last_working_day' => formatDate($this->last_working_day),
            'reason' => $this->reason,
            'status' => $this->status,
            'notice_period' => $this->notice_period,
        ];
    }
}
