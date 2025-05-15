<?php

namespace Modules\System\Branch\Http\Requests;

use Illuminate\Validation\Rule;
use Modules\Common\Http\Requests\ApiRequest;
use Modules\Common\Rules\UniqueJson;

class BranchRequest extends ApiRequest
{
    public function rules(): array
    {
        $branch_id = $this->route('branch');

        return [
            'name' => ['required', 'array', 'max:255'],
            'name' => [new UniqueJson('branches', 'name', $branch_id)],
            'phone' => ['nullable', 'string', 'max:20', Rule::unique('branches', 'phone')->ignore($branch_id)],
            'address' => 'nullable|array|max:300',
            'description' => 'nullable|array|max:300',
            'status' => 'boolean', // if not entered it will be true
        ];
    }
}
