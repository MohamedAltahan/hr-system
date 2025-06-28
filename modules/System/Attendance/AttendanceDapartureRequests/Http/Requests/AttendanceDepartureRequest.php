<?php

namespace Modules\System\Attendance\AttendanceDepartureRequest\Http\Requests;

use Modules\Common\Http\Requests\ApiRequest;

class AttendanceDepartureRequestRequest extends ApiRequest
{
    public function rules(): array
    {
        return [
            'employee_id' => 'required|exists:users,id',
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
            // 'check_out' => 'nullable|date_format:H:i',
        ];
    }
}
