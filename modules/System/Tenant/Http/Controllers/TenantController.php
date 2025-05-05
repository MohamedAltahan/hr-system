<?php

namespace Modules\System\Tenant\Http\Controllers;

use Modules\Common\Enums\StatusCodeEnum;
use Modules\Common\Enums\TenantCreateStatus;
use Modules\Common\Http\Controllers\ApiController;
use Modules\Common\Traits\ApiResponse;
use Modules\System\CompanyRegister\Http\Requests\UserRequest;
use Modules\System\Tenant\Http\Requests\TenantRequest;
use Modules\System\Tenant\Http\Resources\TenantResource;
use Modules\System\Tenant\Models\Tenant;
use Modules\System\Tenant\Services\TenantService;
use Modules\Website\User\Models\User;


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
            'tenancy_db_name' => config('app.name') . '-' . $request->domain,
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
        $tenant = $this->TenantService->update($request, $id);

        return $this->sendResponse(
            TenantResource::make($tenant),
            __('Data updated successfully'),
            StatusCodeEnum::Success->value
        );
    }

    public function destroy(Tenant $user)
    {
        $deleted = $this->TenantService->destroy($user);

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
