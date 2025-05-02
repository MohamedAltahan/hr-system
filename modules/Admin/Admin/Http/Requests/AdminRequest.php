<?php

namespace Modules\Admin\Admin\Http\Requests;

use Illuminate\Validation\Rule;
use Modules\Common\Enums\UserRoleEnum;
use Modules\Common\Http\Requests\ApiRequest;

class AdminRequest extends ApiRequest
{
    public function rules(): array
    {
        $user_id = $this->route('user');

        return [
            // 'name' => ['required', 'array', 'max:255'],
            'name_ar' => [
                'nullable',
                Rule::requiredIf($this->input('name_en') == null),
                'string',
                'max:50',
                'unique:users,name_ar',
            ],
            'name_en' => [
                'nullable',
                Rule::requiredIf($this->input('name_ar') == null),
                'string',
                'max:50',
                'unique:users,name_en',
            ],
            'password' => 'required|string|min:2',
            'phone' => ['required', 'string', 'max:20', Rule::unique('users', 'phone')->ignore($user_id)],
            'username' => ['required', 'string', 'max:20', Rule::unique('users', 'username')->ignore($user_id)],
            'branch_id' => 'integer|required|exists:branches,id',
            'email' => ['nullable', 'email', 'max:50', Rule::unique('users', 'email')->ignore($user_id)],
            'role' => ['required', Rule::in(UserRoleEnum::cases())],
            'address' => 'nullable|array|max:300',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:3000',
            'status' => 'boolean', // if not entered it will be true
        ];
    }
}
