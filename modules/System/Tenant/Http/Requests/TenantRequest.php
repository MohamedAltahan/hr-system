<?php

namespace Modules\System\Tenant\Http\Requests;

use Illuminate\Validation\Rule;
use Modules\Common\Http\Requests\ApiRequest;

class TenantRequest extends ApiRequest
{
    public function rules(): array
    {
        $user_id = $this->route('user');

        return [
            'company_name' => ['array', 'required', 'max:255'],
            'company_name.*' => [
                'string',
                'min:3',
                'max:50',
            ],
            'domain' => ['required', 'string', 'min:3', 'max:30', Rule::unique('users', 'domain')->ignore($user_id)],
            'phone' => ['required', 'string', 'min:8', 'max:15', Rule::unique('users', 'phone')->ignore($user_id)],
            'email' => ['required', 'email', 'min:3', 'max:50', Rule::unique('users', 'email')->ignore($user_id)],
            'plan_id' => 'required|exists:plans,id',
        ];
    }
}
