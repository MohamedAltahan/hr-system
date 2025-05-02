<?php

namespace Modules\Erp\Auth\Http\Requests;

use Modules\Common\Http\Requests\ApiRequest;

class LoginRequest extends ApiRequest
{
    public function rules(): array
    {
        return [
            'username' => 'required|string|max:20|exists:users,username',
            'password' => 'required|string|min:2|max:20',
        ];
    }
}
