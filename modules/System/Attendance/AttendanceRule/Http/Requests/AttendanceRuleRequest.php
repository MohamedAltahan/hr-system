<?php

namespace Modules\System\Attendance\AttendanceRule\Http\Requests;

use Illuminate\Validation\Rule;
use Modules\Common\Http\Requests\ApiRequest;
use Modules\Common\Rules\UniqueJson;
use Modules\System\Attendance\AttendanceRule\Enum\ShiftTimeEmum as EnumShiftTimeEmum;
use Modules\System\Attendance\AttendanceRule\Enum\ContractTypeEnum as EnumContractTypeEnum;

class AttendanceRuleRequest extends ApiRequest
{
    public function rules(): array
    {
        $attendance_rules_id = $this->route('attendance_rule');

        return [
            'name' => ['required', 'array', 'max:255', new UniqueJson('attendance_rules', 'name', $attendance_rules_id)],
            'entry_time' => 'required|date_format:H:i',
            'exit_time' => 'required|date_format:H:i',
            'break_time' => 'required|date_format:H:i',
            'grace_period_minutes' => 'required|integer|min:0',
            'shift_time' => ['required', Rule::in(EnumShiftTimeEmum::cases())],
            'work_type' => ['required', Rule::in(EnumContractTypeEnum::cases())],
            'weekly_days_count' => 'required|integer|min:0|max:7',
            'status' => ['required', 'boolean'],
        ];
    }
}
