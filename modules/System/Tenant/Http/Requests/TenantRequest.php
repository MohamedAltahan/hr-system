<?php

namespace Modules\System\Tenant\Http\Requests;

use Illuminate\Validation\Rule;
use Modules\Common\Http\Requests\ApiRequest;

class TenantRequest extends ApiRequest
{
    public function rules(): array
    {
        $tenant_id = $this->route('tenant');
        $centralConnection = config('database.central_connection');

        $rules = [
            'company_name' => ['array', 'required', 'max:255'],
            'company_name.*' => [
                'string',
                'min:3',
                'max:50',
            ],
            'domain' => [
                'required',
                'string',
                'min:3',
                'max:30',
                Rule::unique($centralConnection . '.tenants', 'domain')->ignore($tenant_id),
            ],
            'phone' => [
                'required',
                'string',
                'min:8',
                'max:15',
                Rule::unique($centralConnection . '.tenants', 'phone')->ignore($tenant_id),
            ],
            'email' => [
                'required',
                'email',
                'min:3',
                'max:50',
                Rule::unique($centralConnection . '.tenants', 'email')->ignore($tenant_id),
            ],
            'trial_days' => 'integer|min:1|max:100',
            'is_active' => 'boolean',
        ];

        // if (! $tenant_id) {
        //     $rules['plan_id'] = "required|exists:$centralConnection.plans,id";
        // }

        return $rules;
    }
}
