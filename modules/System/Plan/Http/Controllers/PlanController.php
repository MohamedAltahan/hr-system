<?php

namespace Modules\System\Plan\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Common\Enums\StatusCodeEnum;
use Modules\Common\Http\Controllers\ApiController;
use Modules\Common\Traits\ApiResponse;
use Modules\System\Plan\Http\Requests\AssignPlanToTenantRequest;
use Modules\System\Plan\Http\Requests\PlanRequest;
use Modules\System\Plan\Resources\PlanResource;
use Modules\System\Plan\Services\PlanService;

class PlanController extends ApiController
{
    use ApiResponse;

    public function __construct(protected PlanService $service)
    {
        parent::__construct();
    }

    public function index()
    {
        $plans = $this->service->getPaginatedData($this->perPage);

        return $this->sendResponse(
            PlanResource::paginate($plans),
            __('Data fetched successfully'),
            StatusCodeEnum::Success->value
        );
    }

    public function store(PlanRequest $request)
    {
        $plan = PlanService::storePlan($request);

        return $this->sendResponse(
            PlanResource::make($plan),
            __('Data created successfully'),
            StatusCodeEnum::Success->value
        );
    }

    public function assignPlanToTenant(AssignPlanToTenantRequest $request)
    {
        $data = $this->service->assignPlanToTenant($request);

        return $this->sendResponse(
            PlanResource::make($data),
            __('Data created successfully'),
            StatusCodeEnum::Created_successfully->value
        );
    }

    public function show($id)
    {
        $plan = $this->service->getPlan($id);

        return $this->sendResponse(
            PlanResource::make($plan),
            __('Data fetched successfully'),
            StatusCodeEnum::Success->value
        );
    }

    public function getActivePlans()
    {
        $plans = $this->service->getActivePlans();

        return $this->sendResponse(
            PlanResource::collection($plans),
            __('Data fetched successfully'),
            StatusCodeEnum::Success->value
        );
    }

    public function update(PlanRequest $request, $id)
    {
        $this->service->updatePlan($request, $id);

        return $this->sendResponse(
            [],
            __('Data updated successfully'),
            StatusCodeEnum::Success->value
        );
    }

    public function destroy($id)
    {
        $this->service->destroy($id);

        return $this->sendResponse(
            [],
            __('Data deleted successfully'),
            StatusCodeEnum::Success->value
        );
    }
}
