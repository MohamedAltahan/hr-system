<?php

namespace Modules\System\Employee\EmployeeEvaluation\Http\Controllers;

use Modules\Common\Enums\StatusCodeEnum;
use Modules\Common\Http\Controllers\ApiController;
use Modules\Common\Traits\ApiResponse;
use Modules\System\Employee\EmployeeEvaluation\Http\Requests\EmployeeEvaluationRequest;
use Modules\System\Employee\EmployeeEvaluation\Http\Resources\EmployeeEvaluationResource;
use Modules\System\Employee\EmployeeEvaluation\Models\EmployeeEvaluation;
use Modules\System\Employee\EmployeeEvaluation\Services\EmployeeEvaluationService;

class EmployeeEvaluationController extends ApiController
{
    use ApiResponse;

    public static ?string $model = EmployeeEvaluation::class;

    public function __construct(protected EmployeeEvaluationService $service)
    {
        parent::__construct();
    }

    public function index()
    {
        $data = $this->service->getPaginatedData($this->perPage);

        return $this->sendResponse(
            EmployeeEvaluationResource::paginate($data),
            __('Data fetched successfully'),
            StatusCodeEnum::Success->value
        );
    }

    public function store(EmployeeEvaluationRequest $request)
    {
        $data = $this->service->create($request);

        return $this->sendResponse(
            EmployeeEvaluationResource::make($data),
            __('Data created successfully'),
            StatusCodeEnum::Created_successfully->value
        );
    }

    public function show(EmployeeEvaluation $EmployeeEvaluation)
    {
        return $this->sendResponse(
            EmployeeEvaluationResource::make($EmployeeEvaluation),
            __('Data fetched successfully'),
            StatusCodeEnum::Success->value
        );
    }

    public function update(EmployeeEvaluationRequest $request, int $id)
    {
        $this->service->update($request, $id);

        return $this->sendResponse(
            [],
            __('Data updated successfully'),
            StatusCodeEnum::Success->value
        );
    }

    public function destroy(EmployeeEvaluation $EmployeeEvaluation)
    {
        $this->service->destroy($EmployeeEvaluation);

        return $this->sendResponse(
            [],
            __('Data deleted successfully'),
            StatusCodeEnum::Success->value
        );
    }
}
