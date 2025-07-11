<?php

namespace Modules\System\Tenant\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Modules\Common\Enums\StatusCodeEnum;
use Modules\Common\Enums\TenantCreateStatus;
use Modules\Common\Http\Controllers\ApiController;
use Modules\Common\Traits\ApiResponse;
use Modules\System\Plan\Models\Plan;
use Modules\System\Price\Models\Price;
use Modules\System\Subscription\Enum\SubscriptionStatus;
use Modules\System\Tenant\Http\Requests\TenantRequest;
use Modules\System\Tenant\Http\Resources\TenantResource;
use Modules\System\Tenant\Models\Tenant;
use Modules\System\Tenant\Services\TenantService;
use Modules\System\User\Models\User;

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
            'tenancy_db_name' => config('app.name').'_'.$request->domain,
            'user_id' => null,
            'company_name' => $request->company_name,
            'domain' => $request->domain,
            'is_active' => $request->is_active,
            'version' => config('app.version'),
            'creating_status' => TenantCreateStatus::CREATED,
            // 'plan_id' => $request->plan_id,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);

        $tenant->domains()->create([
            'domain' => $request->domain,
        ]);

        // $plan = Plan::findOrFail($request->plan_id);

        // $newPlanData = $plan->toArray();
        // unset($newPlanData['id']);
        // $newPlanData['tenant_id'] = $tenant->id;
        // $newPlanData['created_at'] = now();
        // $newPlanData['updated_at'] = now();

        // $plan = Plan::create($newPlanData);

        $tenant->subscriptions()->create([
            'tenant_id' => $tenant->id,
            'status' => SubscriptionStatus::ACTIVE->value,
            'start_date' => now(),
            // 'end_date' => $plan->is_trial ? now()->addDays($plan->trial_days) : now()->addMonths($plan->trial_days),
            'end_date' => now()->addDays((int) $request->trial_days),
            'cancel_date' => null,
            'plan_data' => new Price([
                'price' => 0,
                'price_after_discount' => null,
                'currency_code' => config('app.currency'),
                'duration_in_months' => 0,
            ]),
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
        $statue = $this->TenantService->update($request, $id);

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
                StatusCodeEnum::CONFlICT->value
            );
        }

        return $this->sendResponse(
            [],
            __('Data deleted successfully'),
            StatusCodeEnum::Success->value
        );
    }

    public function disableTenant(Request $request)
    {
        $central = config('database.central_connection');

        $validatedData = $request->validate([
            'company_id' => "required|exists:$central.tenants,id",
            'is_active' => 'required|boolean',
        ]);

        $tenant = Tenant::findOrFail($validatedData['company_id']);

        if ($tenant->domain == config('app.owner_domain')) {
            return $this->sendResponse(
                [],
                __('Owner can not be disabled'),
                StatusCodeEnum::CONFlICT->value
            );
        }

        $tenant->update([
            'is_active' => $validatedData['is_active'],
        ]);

        return $this->sendResponse(
            [],
            __('Data updated successfully'),
            StatusCodeEnum::Success->value
        );
    }

    public function updatePassword(Request $request)
    {
        $central = config('database.central_connection');

        $validatedData = $request->validate([
            'company_id' => "required|exists:$central.tenants,id",
            'password' => 'required|confirmed',
        ]);

        if (! empty($validatedData['password'])) {
            $validatedData['password'] = Hash::make($validatedData['password']);
        } else {
            unset($validatedData['password']);
        }

        $tenant = Tenant::findOrFail($validatedData['company_id']);

        tenancy()->initialize($tenant);
        $user = User::where('is_super_admin', 1)->first();
        $user->update($validatedData);
        tenancy()->end();

        return $this->sendResponse(
            [],
            __('Password updated successfully'),
            StatusCodeEnum::Success->value
        );
    }
}
