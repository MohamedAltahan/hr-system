<?php

namespace Modules\System\Employee\EmployeeAssetType\Http\Controllers;

use Modules\Common\Enums\StatusCodeEnum;
use Modules\Common\Http\Controllers\ApiController;
use Modules\Common\Traits\ApiResponse;
use Modules\System\Employee\EmployeeAssetType\Http\Requests\EmployeeAssetTypeRequest;
use Modules\System\Employee\EmployeeAssetType\Http\Resources\EmployeeAssetTypeResource;
use Modules\System\Employee\EmployeeAssetType\Models\EmployeeAssetType;
use Modules\System\Employee\EmployeeAssetType\Services\EmployeeAssetTypeService;

class EmployeeAssetTypeController extends ApiController
{
    use ApiResponse;

    public static ?string $model = EmployeeAssetType::class;

    public function __construct(protected EmployeeAssetTypeService $service)
    {
        parent::__construct();
    }

    public function index()
    {
        $data = $this->service->getPaginatedData($this->perPage);

        return $this->sendResponse(
            EmployeeAssetTypeResource::paginate($data),
            __('Data fetched successfully'),
            StatusCodeEnum::Success->value
        );
    }

    public function store(EmployeeAssetTypeRequest $request)
    {
        $data = $this->service->create($request, new EmployeeAssetType);

        return $this->sendResponse(
            EmployeeAssetTypeResource::make($data),
            __('Data created successfully'),
            StatusCodeEnum::Created_successfully->value
        );
    }

    public function show(EmployeeAssetType $employeeAssetType)
    {
        return $this->sendResponse(
            EmployeeAssetTypeResource::make($employeeAssetType),
            __('Data fetched successfully'),
            StatusCodeEnum::Success->value
        );
    }

    public function update(EmployeeAssetTypeRequest $request, int $id)
    {
        $this->service->update($request, $id);

        return $this->sendResponse(
            [],
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
