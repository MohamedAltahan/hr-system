<?php

namespace Modules\System\AttendanceRule\Http\Requests;

use Illuminate\Validation\Rule;
use Modules\Common\Http\Requests\ApiRequest;
use Modules\Common\Rules\UniqueJson;
use Modules\System\AttendanceRule\Enum\ShiftTimeEmum;
use Modules\System\AttendanceRule\Enum\WorkTypeEnum;

class AttendanceRuleRequest extends ApiRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'array', 'max:255', new UniqueJson('attendance_rules', 'name')],
            'entry_time' => 'required|date_format:H:i',
            'exit_time' => 'required|date_format:H:i',
            'break_time' => 'required|date_format:H:i',
            'grace_period_minutes' => 'required|integer|min:0',
            'shift_time' => ['required', Rule::in(ShiftTimeEmum::cases())],
            'work_type' => ['required', Rule::in(WorkTypeEnum::cases())],
            'weekly_days_count' => 'required|integer|min:0|max:7',
            'status' => ['required', 'boolean'],
        ];
    }
}
