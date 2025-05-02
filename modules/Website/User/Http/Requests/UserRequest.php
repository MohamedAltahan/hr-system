<?php

namespace Modules\Website\User\Http\Requests;

use Illuminate\Validation\Rule;
use Modules\Common\Http\Requests\ApiRequest;

class UserRequest extends ApiRequest
{
    public function rules(): array
    {
        $user_id = $this->route('user');

        return [
            'username' => ['required', 'string', 'min:3', 'max:20', Rule::unique('users', 'username')->ignore($user_id)],
            'password' => 'required|string|min:6|max:20',
            'company_name' => ['required', 'string', 'min:3', 'max:30', Rule::unique('users', 'company_name')->ignore($user_id)],
            'domain' => ['required', 'string', 'min:3', 'max:30', Rule::unique('users', 'domain')->ignore($user_id)],
            'phone' => ['required', 'string', 'min:8', 'max:15', Rule::unique('users', 'phone')->ignore($user_id)],
            'email' => ['required', 'email', 'min:3', 'max:50', Rule::unique('users', 'email')->ignore($user_id)],
            'plan_id' => 'required|exists:plans,id',
        ];
    }
}
