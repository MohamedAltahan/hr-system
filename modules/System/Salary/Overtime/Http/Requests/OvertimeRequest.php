<?php

namespace Modules\System\Overtime\Http\Requests;

use Modules\Common\Http\Requests\ApiRequest;
use Modules\Common\Rules\UniqueJson;

class OvertimeRequest extends ApiRequest
{
    public function rules(): array
    {
        return [
            'position_id' => ['required', 'exists:positions,id'],
            'number_of_vacancies' => 'required|numeric|min:1|max:9999|integer',
            'description' => 'nullable|max:5000',
            'is_published' => 'boolean',
        ];
    }
}
