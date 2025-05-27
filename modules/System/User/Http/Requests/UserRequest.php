<?php

namespace Modules\System\User\Http\Requests;

use Illuminate\Validation\Rule;
use Modules\Common\Http\Requests\ApiRequest;

class UserRequest extends ApiRequest
{
    public function rules(): array
    {
        $user_id = $this->route('user');

        return [
            'name' => ['required', 'array', 'max:255'],
            'password' => $user_id
                ? ['sometimes', 'string', 'min:2']
                : ['required', 'string', 'min:2'],
            'username' => ['required', 'string', 'max:20', Rule::unique('users', 'username')->ignore($user_id)],
            'phone' => ['required', 'string', 'max:20', Rule::unique('users', 'phone')->ignore($user_id)],
            'branch_id' => 'integer|required|exists:branches,id',
            'email' => ['nullable', 'email', 'max:50', Rule::unique('users', 'email')->ignore($user_id)],
            'address' => 'nullable|array|max:300',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:3000',
            'is_active' => 'boolean|nullable', // if not entered it will be true
            'birthday' => 'nullable|date',
            'hire_date' => 'nullable|date',
            'gender' => 'nullable|in:male,female',
            'social_status' => 'nullable|in:single,married',
            'national_id' => ['nullable', 'string', 'max:30', Rule::unique('users', 'national_id')->ignore($user_id)],
            'job_title_id' => 'nullable|exists:job_titles,id',
            'direct_manager_id' => 'nullable|exists:users,id',
            'department_id' => 'nullable|exists:departments,id',
            'position_id' => 'nullable|exists:positions,id',
            'role_ids' => 'required|array',
            'role_ids.*' => 'exists:roles,id',
        ];
    }
}
