<?php

namespace Modules\System\Plan\Http\Requests;

use Modules\Common\Http\Requests\ApiRequest;

class PlanRequest extends ApiRequest
{
    public function rules(): array
    {
        $sidebarItemId = $this->route('plan');

        return [
            'name' => ['required', 'array', 'max:255'],
            'description' => 'nullable|array|max:500',
            'is_trial' => 'boolean',
            'price' => 'numeric|max:99999999|min:0|required_if:is_trial,false',
            'price_after_discount' => 'sometimes|nullable|numeric|max:99999999|min:0|lt:price',
            'is_active' => 'boolean',
            'order' => 'integer',
            'is_popular' => 'boolean',
            'duration_in_months' => 'required_if:is_trial,false|sometimes|nullable|min:1|max:100|integer',
            'trial_days' => 'required_if:is_trial,true|sometimes|nullable|min:1|max:200|integer',
            'currency' => 'required|array',
            'features.ar' => 'nullable|array',
            'features.en' => 'nullable|array',
        ];
    }
}
