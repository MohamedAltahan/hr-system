<?php

namespace Modules\Erp\Permission\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Modules\Erp\Permission\Models\Permission;

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
            'guard_name' => ['required', 'string', 'max:191', Rule::in($permission_guards)],
            'permission_Ids' => 'required|array',
            'permission_Ids.*' => 'exists:permissions,id',
        ];
    }
}
