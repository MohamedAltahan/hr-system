<?php

namespace Modules\System\Subscription\Http\Requests;

use Modules\Common\Http\Requests\ApiRequest;

class SubscriptionRequest extends ApiRequest
{
    public function rules(): array
    {
        // $sidebarItemId = $this->route('plan');

        $centralConnection = config('database.central_connection');

        return [
            'plan_id' => "required|exists:$centralConnection.plans,id",
            'company_id' => "required|exists:$centralConnection.tenants,id",
        ];
    }
}
