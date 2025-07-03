<?php

namespace Modules\System\Employee\EmployeeAssetType\Http\Requests;

use Modules\Common\Http\Requests\ApiRequest;
use Modules\Common\Rules\UniqueJson;

class EmployeeAssetTypeRequest extends ApiRequest
{
    public function rules(): array
    {
        $department_id = $this->route('department');

        return [
            'name' => ['required', 'array', 'max:255'],
            'name' => [new UniqueJson('departments', 'name', $department_id)],
            'description' => 'nullable|array|max:300',
            'branch_id' => 'required|exists:branches,id',
        ];
    }
}
