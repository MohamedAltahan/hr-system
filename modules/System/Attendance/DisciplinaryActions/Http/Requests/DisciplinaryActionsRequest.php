<?php

namespace Modules\System\Attendance\DisciplinaryActions\Http\Requests;

use Illuminate\Validation\Rule;
use Modules\Common\Http\Requests\ApiRequest;
use Modules\System\Attendance\DisciplinaryActions\Enum\DisciplinaryActionsEnum;

class DisciplinaryActionsRequest extends ApiRequest
{
    public function rules(): array
    {
        return [
            'employee_id' => 'required|exists:users,id',
            'action_type' => ['required', Rule::in(DisciplinaryActionsEnum::cases())],
            'amount' => 'nullable|numeric|min:0|max:999999',
            'execution_date' => 'required|date',
            'reason' => 'nullable|string',
            'status' => ['required', 'string', 'in:pending,accepted,rejected'],
        ];
    }
}
