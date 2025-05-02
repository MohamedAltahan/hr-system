<?php

namespace Modules\Admin\Plan\Http\Controllers;

use Modules\Admin\Plan\Http\Requests\PlanRequest;
use Modules\Admin\Plan\Resources\PlanResource;
use Modules\Admin\Plan\Services\PlanService;
use Modules\Common\Enums\StatusCodeEnum;
use Modules\Common\Http\Controllers\ApiController;
use Modules\Common\Traits\ApiResponse;

class PlanController extends ApiController
{
    use ApiResponse;

    public function __construct(protected PlanService $planService)
    {
        parent::__construct();
    }

    public function index()
    {
        $plans = $this->planService->getPaginatedPlans($this->perPage);

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

    public function show($id)
    {
        $plan = $this->planService->getPlan($id);

        return $this->sendResponse(
            PlanResource::make($plan),
            __('Data fetched successfully'),
            StatusCodeEnum::Success->value
        );
    }

    public function update(PlanRequest $request, $id)
    {
        $this->planService->updatePlan($request, $id);

        return $this->sendResponse(
            [],
            __('Data updated successfully'),
            StatusCodeEnum::Success->value
        );
    }

    public function destroy($id)
    {
        //
    }
}
