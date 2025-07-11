<?php

namespace Modules\System\MyService\FinancialProfile\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;
use Modules\Common\Traits\HasPagination;

class FinancialProfileResource extends JsonResource
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
            'basic_salary' => $this->basic_salary,
            'allowances' => $this->allowances,
            'bonuses' => $this->bonuses,
            'total_deductions' => $this->total_deductions,
            'net_salary' => $this->net_salary,
            'payment_method' => $this->payment_method,
        ];
    }
}
