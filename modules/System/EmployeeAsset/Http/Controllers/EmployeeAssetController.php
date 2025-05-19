<?php

namespace Modules\System\EmployeeAsset\Http\Controllers;

use Modules\Common\Enums\StatusCodeEnum;
use Modules\Common\Http\Controllers\ApiController;
use Modules\Common\Traits\ApiResponse;
use Modules\System\EmployeeAsset\Http\Requests\EmployeeAssetRequest;
use Modules\System\EmployeeAsset\Http\Resources\EmployeeAssetResource;
use Modules\System\EmployeeAsset\Models\EmployeeAsset;
use Modules\System\EmployeeAsset\Services\EmployeeAssetService;

class EmployeeAssetController extends ApiController
{
    use ApiResponse;

    public static ?string $model = EmployeeAsset::class;

    public function __construct(protected EmployeeAssetService $service)
    {
        parent::__construct();
    }

    public function index()
    {
        $data = $this->service->getPaginatedData($this->perPage);

        return $this->sendResponse(
            EmployeeAssetResource::paginate($data),
            __('Data fetched successfully'),
            StatusCodeEnum::Success->value
        );
    }

    public function store(EmployeeAssetRequest $request)
    {
        $data = $this->service->create($request);

        return $this->sendResponse(
            EmployeeAssetResource::make($data),
            __('Data created successfully'),
            StatusCodeEnum::Created_successfully->value
        );
    }

    public function show(EmployeeAsset $department)
    {
        return $this->sendResponse(
            EmployeeAssetResource::make($department),
            __('Data fetched successfully'),
            StatusCodeEnum::Success->value
        );
    }

    public function update(EmployeeAssetRequest $request, int $id)
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
