<?php

namespace Modules\System\Employee\JobTitle\Http\Requests;

use Modules\Common\Http\Requests\ApiRequest;
use Modules\Common\Rules\UniqueJson;

class JobTitleRequest extends ApiRequest
{
    public function rules(): array
    {
        $jobTitle_id = $this->route('job_title');

        return [
            'name' => ['required', 'array', 'max:255'],
            'name' => [new UniqueJson('job_titles', 'name', $jobTitle_id)],
        ];
    }
}
