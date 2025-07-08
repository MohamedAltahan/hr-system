<?php

namespace Modules\System\Salary\SalaryStructure\Http\Controllers;

use Modules\Common\Enums\StatusCodeEnum;
use Modules\Common\Http\Controllers\ApiController;
use Modules\Common\Traits\ApiResponse;
use Modules\System\Salary\SalaryStructure\Http\Requests\SalaryComponentRequest;
use Modules\System\Salary\SalaryStructure\Http\Resources\SalaryComponentResource;
use Modules\System\Salary\SalaryStructure\Models\SalaryComponent;
use Modules\System\Salary\SalaryStructure\Services\SalaryComponentService;

class SalaryComponentController extends ApiController
{
    use ApiResponse;

    public static ?string $model = SalaryComponent::class;

    public function __construct(protected SalaryComponentService $service)
    {
        parent::__construct();
    }

    public function index()
    {
        $data = $this->service->getPaginatedData($this->perPage);

        return $this->sendResponse(
            SalaryComponentResource::paginate($data),
            __('Data fetched successfully'),
            StatusCodeEnum::Success->value
        );
    }

    public function store(SalaryComponentRequest $request)
    {
        $data = $this->service->create($request);

        return $this->sendResponse(
            SalaryComponentResource::make($data),
            __('Data created successfully'),
            StatusCodeEnum::Created_successfully->value
        );
    }

    public function show(SalaryComponent $SalaryComponent)
    {
        return $this->sendResponse(
            SalaryComponentResource::make($SalaryComponent),
            __('Data fetched successfully'),
            StatusCodeEnum::Success->value
        );
    }

    public function update(SalaryComponentRequest $request, int $id)
    {
        $data = $this->service->update($request, $id);

        return $this->sendResponse(
            SalaryComponentResource::make($data),
            __('Data updated successfully'),
            StatusCodeEnum::Success->value
        );
    }

    public function destroy(int $id)
    {
        $deleteStatus = $this->service->destroy($id);

        if (! $deleteStatus) {
            return $this->sendResponse(
                [],
                __('Data not deleted because it is in use'),
                StatusCodeEnum::CONFlICT->value
            );
        }

        return $this->sendResponse(
            [],
            __('Data deleted successfully'),
            StatusCodeEnum::Success->value
        );
    }
}
