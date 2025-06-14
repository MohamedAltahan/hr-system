<?php

namespace Modules\System\Subscription\Http\Requests;

use Illuminate\Validation\Rule;
use Modules\Common\Http\Requests\ApiRequest;

class SubscriptionRequest extends ApiRequest
{
    public function rules(): array
    {
        $centralConnection = config('database.central_connection');
        $companyId = $this->input('company_id');

        return [
            'company_id' => "required|exists:$centralConnection.tenants,id",
            // 'plan_id' => [
            //     'required',
            //     Rule::exists("$centralConnection.plans", 'id')
            //         ->where(function ($query) use ($companyId) {
            //             $query->where('tenant_id', $companyId);
            //         }),
            // ],
            'price_id' => [
                'required',
                Rule::exists("$centralConnection.prices", 'id')
                    ->where(function ($query) use ($companyId) {
                        $query->where('tenant_id', $companyId);
                    }),
            ],
        ];
    }
}
