<?php

namespace Modules\Website\Auth\Http\Requests;

use Modules\Common\Http\Requests\ApiRequest;

class LoginRequest extends ApiRequest
{
    public function rules(): array
    {
        return [
            'username' => 'required|string|min:3|max:20|exists:users,username',
            'password' => 'required|string|min:6|max:20',
        ];
    }
}
