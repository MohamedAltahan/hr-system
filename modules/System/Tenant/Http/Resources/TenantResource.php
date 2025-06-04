<?php

namespace Modules\System\Tenant\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Common\Traits\HasPagination;
use Modules\System\Plan\Resources\PlanResource;
use Modules\System\Subscription\Resources\SubscriptionResource;

class TenantResource extends JsonResource
{
    use HasPagination;

    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'company_name' => $this->company_name,
            'domain' => $this->domain,
            'email' => $this->email,
            'phone' => $this->phone,
            'is_active' => $this->is_active,
            'version' => $this->version,
            'creating_status' => $this->creating_status->label(),
            'created_at' => formatDate($this->created_at),
            'subscription' => SubscriptionResource::make($this->currentSubscription),
        ];
    }
}
