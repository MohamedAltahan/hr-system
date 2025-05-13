<?php

namespace Modules\System\JobTitle\Http\Requests;


use Modules\Common\Http\Requests\ApiRequest;
use Modules\Common\Rules\UniqueJson;

class JobTitleRequest extends ApiRequest
{
    public function rules(): array
    {
        $jobTitle_id = $this->route('jobTitle');

        return [
            'name' => ['required', 'array', 'max:255'],
            'name' => [new UniqueJson('jobTitles', 'name', $jobTitle_id)],
        ];
    }
}
