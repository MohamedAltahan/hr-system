<?php

namespace Modules\System\Price\Http\Requests;

use Illuminate\Validation\Rule;
use Modules\Common\Http\Requests\ApiRequest;

class AssignPriceToTenantRequest extends ApiRequest
{
    public function rules(): array
    {
        $central = config('database.central_connection');

        return [
            'company_id' => "required|exists:$central.tenants,id",
            'price' => 'numeric|max:99999999|min:0|required_if:is_trial,false',
            'price_after_discount' => 'sometimes|nullable|numeric|max:99999999|min:0|lt:price',
            'duration_in_months' => 'required|min:1|max:100|integer',
            'currency_code' => ["required", "string", "max:4", Rule::in(array_keys(config('currencies')))],
        ];
    }
}
