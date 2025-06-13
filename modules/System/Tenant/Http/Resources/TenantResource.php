<?php

namespace Modules\System\Tenant\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\DB;
use Modules\Common\Traits\HasPagination;
use Modules\System\Plan\Resources\PlanResource;
use Modules\System\Subscription\Resources\SubscriptionResource;
use Modules\System\Tenant\Models\Tenant;
use Modules\System\User\Http\Resources\UserResource;
use Modules\System\User\Models\User;

class TenantResource extends JsonResource
{
    use HasPagination;

    public function toArray(Request $request): array
    {
        $tenant = Tenant::find($this->id);
        tenancy()->initialize($tenant);
        $user = User::where('is_super_admin', 1)->first();
        tenancy()->end();
        $userName = $user?->name;

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
            'super_admin_name' => $userName,
        ];
    }
}
