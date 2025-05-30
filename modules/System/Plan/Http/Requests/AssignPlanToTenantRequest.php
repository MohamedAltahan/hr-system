<?php

namespace Modules\System\Plan\Http\Requests;

use Modules\Common\Http\Requests\ApiRequest;

class AssignPlanToTenantRequest extends ApiRequest
{
    public function rules(): array
    {

        $central = config('database.central_connection');
        $companyId = $this->input('company_id');
        $planId = $this->input('plan_id');

        return [
            'company_id' => "required|exists:$central.tenants,id",
            'plan_id' => "required|exists:$central.plans,id",
        ];
    }
}
