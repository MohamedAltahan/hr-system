<?php

namespace Modules\Erp\Branch\Http\Requests;

use Illuminate\Validation\Rule;
use Modules\Common\Http\Requests\ApiRequest;

class BranchRequest extends ApiRequest
{
    public function rules(): array
    {
        $branch_id = $this->route('branch');

        return [
            // 'name' => ['required', 'array', 'max:255'],
            'name_ar' => [
                'nullable',
                Rule::requiredIf($this->input('name_en') == null),
                'string',
                'max:50',
                Rule::unique('branches', 'name_ar')->ignore($branch_id),
            ],
            'name_en' => [
                'nullable',
                Rule::requiredIf($this->input('name_ar') == null),
                'string',
                'max:50',
                Rule::unique('branches', 'name_en')->ignore($branch_id),
            ],
            'phone' => ['nullable', 'string', 'max:20', Rule::unique('branches', 'phone')->ignore($branch_id)],
            'address' => 'nullable|array|max:300',
            'description' => 'nullable|array|max:300',
            'status' => 'boolean', // if not entered it will be true
        ];
    }
}
