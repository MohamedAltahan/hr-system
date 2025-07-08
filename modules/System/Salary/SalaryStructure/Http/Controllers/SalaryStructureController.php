<?php

namespace Modules\System\Salary\SalaryStructure\Http\Controllers;

use Modules\Common\Enums\StatusCodeEnum;
use Modules\Common\Http\Controllers\ApiController;
use Modules\Common\Traits\ApiResponse;
use Modules\System\Salary\SalaryStructure\Http\Requests\SalaryStructureRequest;
use Modules\System\Salary\SalaryStructure\Http\Resources\SalaryStructureResource;
use Modules\System\Salary\SalaryStructure\Models\SalaryStructure;
use Modules\System\Salary\SalaryStructure\Services\SalaryStructureService;

class SalaryStructureController extends ApiController
{
    use ApiResponse;

    public static ?string $model = SalaryStructure::class;

    public function __construct(protected SalaryStructureService $service)
    {
        parent::__construct();
    }

    public function index()
    {
        $data = $this->service->getPaginatedData($this->perPage);

        return $this->sendResponse(
            SalaryStructureResource::paginate($data),
            __('Data fetched successfully'),
            StatusCodeEnum::Success->value
        );
    }

    public function store(SalaryStructureRequest $request)
    {
        $data = $this->service->create($request);

        return $this->sendResponse(
            SalaryStructureResource::make($data),
            __('Data created successfully'),
            StatusCodeEnum::Created_successfully->value
        );
    }

    public function show(SalaryStructure $SalaryStructure)
    {
        return $this->sendResponse(
            SalaryStructureResource::make($SalaryStructure),
            __('Data fetched successfully'),
            StatusCodeEnum::Success->value
        );
    }

    public function update(SalaryStructureRequest $request, int $id)
    {
        $data = $this->service->update($request, $id);

        return $this->sendResponse(
            SalaryStructureResource::make($data),
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
