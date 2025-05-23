<?php

namespace Modules\System\Permission\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Modules\System\Permission\Models\Permission;

class RoleRequest extends FormRequest
{
    public function rules()
    {
        $permission_guards = Permission::pluck('guard_name')->toArray();
        $role_id = $this->route('role');

        return [
            'title' => 'required|array',
            'title.*' => 'string|max:255|min:1',
            'name' => ['required', 'string', 'max:191', Rule::unique('roles', 'name')->ignore($role_id)],
            'permission_Ids' => 'required|array',
            'permission_Ids.*' => 'exists:permissions,id',
        ];
    }
}
