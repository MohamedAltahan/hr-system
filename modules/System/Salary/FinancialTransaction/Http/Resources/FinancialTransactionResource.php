<?php

namespace Modules\System\Salary\FinancialTransaction\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;
use Modules\Common\Traits\HasPagination;

class FinancialTransactionResource extends JsonResource
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
            ],
            'transaction_name' => $this->transaction_name,
            'transaction_type' => $this->transaction_type,
            'date' => formatDate($this->date),
            'status' => $this->status,
            'notes' => $this->notes,
            'amount' => $this->amount,
        ];
    }
}
