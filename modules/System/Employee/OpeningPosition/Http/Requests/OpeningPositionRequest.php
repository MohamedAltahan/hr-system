<?php

namespace Modules\System\Employee\OpeningPosition\Http\Requests;

use Modules\Common\Http\Requests\ApiRequest;

class OpeningPositionRequest extends ApiRequest
{
    public function rules(): array
    {
        return [
            'position_id' => ['required', 'exists:job_titles,id'],
            'number_of_vacancies' => 'required|numeric|min:1|max:9999|integer',
            'description' => 'nullable|max:5000',
            'is_published' => 'boolean',
            'department_id' => 'required|exists:departments,id',
        ];
    }
}
