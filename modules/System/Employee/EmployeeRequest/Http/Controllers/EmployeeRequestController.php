<?php

namespace Modules\System\Employee\EmployeeRequest\Http\Controllers;

use Modules\Common\Enums\StatusCodeEnum;
use Modules\Common\Http\Controllers\ApiController;
use Modules\Common\Traits\ApiResponse;
use Modules\System\Employee\EmployeeRequest\Http\Requests\EmployeeRequestRequest;
use Modules\System\Employee\EmployeeRequest\Http\Requests\EmployeeRequestUpdateStatusRequest;
use Modules\System\Employee\EmployeeRequest\Http\Resources\EmployeeRequestResource;
use Modules\System\Employee\EmployeeRequest\Models\EmployeeRequest;
use Modules\System\Employee\EmployeeRequest\Services\EmployeeRequestService;

class EmployeeRequestController extends ApiController
{
    use ApiResponse;

    public static ?string $model = EmployeeRequest::class;

    public function __construct(protected EmployeeRequestService $service)
    {
        parent::__construct();
    }

    public function index()
    {
        $data = $this->service->getPaginatedData($this->perPage);

        return $this->sendResponse(
            EmployeeRequestResource::paginate($data),
            __('Data fetched successfully'),
            StatusCodeEnum::Success->value
        );
    }

    public function store(EmployeeRequestRequest $request)
    {
        $data = $this->service->create($request);

        return $this->sendResponse(
            EmployeeRequestResource::make($data),
            __('Data created successfully'),
            StatusCodeEnum::Created_successfully->value
        );
    }

    public function show(int $id)
    {
        $date = $this->service->show($id);

        return $this->sendResponse(
            EmployeeRequestResource::make($date),
            __('Data fetched successfully'),
            StatusCodeEnum::Success->value
        );
    }

    public function update(EmployeeRequestRequest $request, int $id)
    {
        $data = $this->service->update($request, $id);

        return $this->sendResponse(
            EmployeeRequestResource::make($data),
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

    public function updateStatus(EmployeeRequestUpdateStatusRequest $request, int $id)
    {
        $data = $this->service->updateStatus($request, $id);

        return $this->sendResponse(
            EmployeeRequestResource::make($data),
            __('Data updated successfully'),
            StatusCodeEnum::Success->value
        );
    }
}
