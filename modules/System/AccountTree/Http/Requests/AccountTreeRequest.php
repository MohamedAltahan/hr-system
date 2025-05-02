<?php

namespace Modules\Erp\AccountTree\Http\Requests;

use Illuminate\Validation\Rule;
use Modules\Common\Enums\AccountTree\AccountTreeCategoryEnum;
use Modules\Common\Enums\AccountTree\AccountTreeNatureEnum;
use Modules\Common\Http\Requests\ApiRequest;

class AccountTreeRequest extends ApiRequest
{
    public function rules(): array
    {
        $accountTree_id = $this->route('account_tree');

        return [
            // 'name' => ['required', 'array', 'max:255'],
            'name_ar' => [
                'nullable',
                Rule::requiredIf($this->input('name_en') == null),
                'string',
                'max:50',
                Rule::unique('account_trees', 'name_ar')->ignore($accountTree_id),
            ],
            'name_en' => [
                'nullable',
                Rule::requiredIf($this->input('name_ar') == null),
                'string',
                'max:50',
                Rule::unique('account_trees', 'name_en')->ignore($accountTree_id),

            ],
            'description' => 'nullable|array|max:300',
            'status' => ['required', 'boolean'], // if not entered it will be true
            'account_nature' => ['required', Rule::in(AccountTreeNatureEnum::cases())],
            'account_category' => ['required', Rule::in(AccountTreeCategoryEnum::cases())],
            'allow_delete' => ['required', 'boolean'], // if not entered it will be true
        ];
    }
}
