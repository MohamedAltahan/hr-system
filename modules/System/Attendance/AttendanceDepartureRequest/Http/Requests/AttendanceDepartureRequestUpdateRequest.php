<?php

namespace Modules\System\Attendance\AttendanceDepartureRequest\Http\Requests;

use Modules\Common\Http\Requests\ApiRequest;

class AttendanceDepartureRequestUpdateRequest extends ApiRequest
{
    public function rules(): array
    {
        return [
            'check_in' => 'required|date_format:H:i',
            'check_out' => 'required|date_format:H:i',
        ];
    }
}
