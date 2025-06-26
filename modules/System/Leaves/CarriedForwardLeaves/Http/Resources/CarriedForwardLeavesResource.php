<?php

namespace Modules\System\Leaves\CarriedForwardLeaves\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;
use Modules\Common\Traits\HasPagination;

class CarriedForwardLeavesResource extends JsonResource
{
    use HasPagination;

    public function toArray(Request $request): array
    {

        return [
            'id' => $this->id,
            'empoloyee' => [
                'id' => $this->employee->id,
                'name' => $this->employee->name,
                'number' => $this->employee->employee_number,
                'department' => $this->employee->department?->name,
            ],
            'days_balance' => $this->days_balance,
            'year' => $this->year,
        ];
    }
}
