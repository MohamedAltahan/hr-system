<?php

namespace Modules\System\Salary\FlightTicket\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;
use Modules\Common\Traits\HasPagination;

class FlightTicketResource extends JsonResource
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
            'responsible_person_name' => $this->responsible_person_name,
            'ticket_type' => $this->ticket_type,
            'ticket_price' => formatCurrency($this->ticket_price),
            'flight_date' => formatDate($this->flight_date),
            'status' => $this->status,
        ];
    }
}
