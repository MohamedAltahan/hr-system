<?php

namespace Modules\System\Leaves\CarriedForwardLeaves\Http\Controllers;

use Modules\Common\Enums\StatusCodeEnum;
use Modules\Common\Http\Controllers\ApiController;
use Modules\Common\Traits\ApiResponse;
use Modules\System\Leaves\CarriedForwardLeaves\Http\Requests\CarriedForwardLeavesRequest;
use Modules\System\Leaves\CarriedForwardLeaves\Http\Resources\CarriedForwardLeavesResource;
use Modules\System\Leaves\CarriedForwardLeaves\Models\CarriedForwardLeaves;
use Modules\System\Leaves\CarriedForwardLeaves\Services\CarriedForwardLeavesService;

class CarriedForwardLeavesController extends ApiController
{
    use ApiResponse;

    public static ?string $model = CarriedForwardLeaves::class;

    public function __construct(protected CarriedForwardLeavesService $service)
    {
        parent::__construct();
    }

    public function index()
    {
        $data = $this->service->getPaginatedData($this->perPage);

        return $this->sendResponse(
            CarriedForwardLeavesResource::paginate($data),
            __('Data fetched successfully'),
            StatusCodeEnum::Success->value
        );
    }

    public function store(CarriedForwardLeavesRequest $request)
    {
        $data = $this->service->create($request);

        return $this->sendResponse(
            CarriedForwardLeavesResource::make($data),
            __('Data created successfully'),
            StatusCodeEnum::Created_successfully->value
        );
    }

    public function show(int $id)
    {
        $data = CarriedForwardLeaves::with('employee')->findOrFail($id);

        return $this->sendResponse(
            CarriedForwardLeavesResource::make($data),
            __('Data fetched successfully'),
            StatusCodeEnum::Success->value
        );
    }

    public function update(CarriedForwardLeavesRequest $request, int $id)
    {
        $data = $this->service->update($request, $id);

        return $this->sendResponse(
            CarriedForwardLeavesResource::make($data),
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
