<?php

namespace Modules\System\Salary\FlightTicket\Http\Requests;

use Modules\Common\Http\Requests\ApiRequest;

class FlightTicketRequest extends ApiRequest
{
    public function rules(): array
    {

        return [
            'employee_id' => 'required|exists:users,id',
            'ticket_type' => 'string|required|in:round_trip,one_way,return_only',
            'ticket_price' => 'required|numeric|min:0|max:10000000',
            'flight_date' => 'required|date',
            'responsible_person_name' => 'nullable|string|max:1000',
            'status' => ['required', 'string', 'in:pending,accepted,rejected'],
        ];
    }
}
