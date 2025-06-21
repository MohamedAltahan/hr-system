<?php

namespace Modules\System\Salary\Overtime\Http\Requests;

use Modules\Common\Http\Requests\ApiRequest;

class OvertimeRequest extends ApiRequest
{
    public function rules(): array
    {
        return [
            'employee_id' => 'required|exists:users,id',
            'overtime_date' => 'nullable|date',
            'start_time' => 'nullable|date_format:H:i',
            'end_time' => 'nullable|date_format:H:i',
            'status' => ['required', 'string', 'in:pending,accepted,rejected'],
            'reason' => 'nullable|string|max:500',
            'duration_in_hours' => 'required|numeric|min:0|max:500',
            'amount' => 'required|numeric|min:0|max:10000000',
        ];
    }
}
