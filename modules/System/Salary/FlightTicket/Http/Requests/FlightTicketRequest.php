<?php

namespace Modules\System\Salary\FlightTicket\Http\Requests;

use Modules\Common\Http\Requests\ApiRequest;

class FlightTicketRequest extends ApiRequest
{
    public function rules(): array
    {

        return [
            'employee_id' => 'required|exists:users,id',
            'transaction_type' => 'string|required|in:increment,decrement',
            'transaction_name' => 'required|string',
            'amount' => 'required|numeric|min:0|max:10000000',
            'date' => 'required|date',
            'is_outside_salary' => 'boolean|nullable',
            'notes' => 'nullable|string|max:1000',
            'status' => ['required', 'string', 'in:pending,accepted,rejected'],
        ];
    }
}
