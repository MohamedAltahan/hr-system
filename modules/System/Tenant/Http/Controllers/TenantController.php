<?php

namespace Modules\System\Tenant\Http\Controllers;

use Modules\Common\Enums\StatusCodeEnum;
use Modules\Common\Enums\TenantCreateStatus;
use Modules\Common\Http\Controllers\ApiController;
use Modules\Common\Traits\ApiResponse;
use Modules\System\Plan\Models\Plan;
use Modules\System\Subscription\Enum\SubscriptionStatus;
use Modules\System\Subscription\Models\Subscription;
use Modules\System\Tenant\Http\Requests\TenantRequest;
use Modules\System\Tenant\Http\Resources\TenantResource;
use Modules\System\Tenant\Models\Tenant;
use Modules\System\Tenant\Services\TenantService;

class TenantController extends ApiController
{
    use ApiResponse;

    public function __construct(protected TenantService $TenantService)
    {
        parent::__construct();
    }

    public function index()
    {
        $tenants = $this->TenantService->getPaginatedTenants($this->perPage);

        return $this->sendResponse(
            TenantResource::paginate($tenants),
            __('Data fetched successfully'),
            StatusCodeEnum::Success->value
        );
    }

    public function store(TenantRequest $request)
    {

        $tenant = Tenant::create([
            'tenancy_db_name' => config('app.name') . '_' . $request->domain,
            'user_id' => null,
            'company_name' => $request->company_name,
            'domain' => $request->domain,
            'is_active' => 1,
            'version' => config('app.version'),
            'creating_status' => TenantCreateStatus::CREATED,
            'plan_id' => $request->plan_id,
        ]);

        $tenant->domains()->create([
            'domain' => $request->domain,
        ]);

        $centralConnection = config('database.central_connection');

        $plan = Plan::on($centralConnection)->findOrFail($request->plan_id);

        $tenant->subscriptions()->create([
            'tenant_id' => $tenant->id,
            'status' => SubscriptionStatus::ACTIVE->value,
            'start_date' => now(),
            'end_date' => $plan->is_trial ? now()->addDays($plan->trial_days) : now()->addMonths($plan->trial_days),
            'cancel_date' => null,
            'plan_data' => $plan,
        ]);

        return $this->sendResponse(
            TenantResource::make($tenant),
            __('Data created successfully'),
            StatusCodeEnum::Created_successfully->value
        );
    }

    public function show(int $id)
    {
        $tenant = $this->TenantService->getTenant($id);

        return $this->sendResponse(
            TenantResource::make($tenant),
            __('Data fetched successfully'),
            StatusCodeEnum::Success->value
        );
    }

    public function update(TenantRequest $request, int $id)
    {
        $this->TenantService->update($request, $id);

        return $this->sendResponse(
            [],
            __('Data updated successfully'),
            StatusCodeEnum::Success->value
        );
    }

    public function destroy(Tenant $tenant)
    {
        $deleted = $this->TenantService->destroy($tenant);

        if (! $deleted) {
            return $this->sendResponse(
                [],
                __('Owner can not be deleted'),
                StatusCodeEnum::Success->value
            );
        }

        return $this->sendResponse(
            [],
            __('Data deleted successfully'),
            StatusCodeEnum::Success->value
        );
    }
}
