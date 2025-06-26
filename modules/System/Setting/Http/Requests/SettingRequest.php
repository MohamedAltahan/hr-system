<?php

namespace Modules\System\Setting\Http\Requests;

use Modules\Common\Http\Requests\ApiRequest;
use Modules\Common\Rules\UniqueJson;

class SettingRequest extends ApiRequest
{
    public function rules(): array
    {

        return [
            'name' => ['required', 'array', 'max:255'],
            'key' => ['required', 'string', 'max:255'],
            'value' => 'required|array',
        ];
    }
}
