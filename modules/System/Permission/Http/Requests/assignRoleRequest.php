<?php

namespace Modules\Erp\Permission\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class assignRoleRequest extends FormRequest
{
    public function rules()
    {
        return [
            'user_id' => 'required|exists:users,id',
            'role_ids' => 'required|array',
            'role_ids.*' => 'exists:roles,id',
        ];
    }
}
