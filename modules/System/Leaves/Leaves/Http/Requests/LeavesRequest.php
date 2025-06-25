<?php

namespace Modules\System\Leaves\Leaves\Http\Requests;

use Modules\Common\Http\Requests\ApiRequest;

class LeavesRequest extends ApiRequest
{
    public function rules(): array
    {
        return [
            'employee_id' => 'required|exists:users,id',
            'leave_type' => 'string|required|in:round_trip,one_way,return_only',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'status' => ['required', 'string', 'in:pending,accepted,rejected'],
        ];
    }
}
