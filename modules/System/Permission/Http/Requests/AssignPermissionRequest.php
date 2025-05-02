<?php

namespace Modules\Erp\Permission\Services;

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
