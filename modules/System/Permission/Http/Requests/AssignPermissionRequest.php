<?php

namespace Modules\System\Permission\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AssignPermissionRequest extends FormRequest
{
    public function rules()
    {
        return [
            'permissions' => 'required|array',
            'permissions.*' => 'required|exists:permissions,id',
        ];
    }
}
