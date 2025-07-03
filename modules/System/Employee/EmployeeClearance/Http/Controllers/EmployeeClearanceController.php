<?php

namespace Modules\System\Employee\EmployeeClearance\Http\Controllers;

use Modules\Common\Enums\StatusCodeEnum;
use Modules\Common\Http\Controllers\ApiController;
use Modules\Common\Traits\ApiResponse;
use Modules\System\Employee\EmployeeClearance\Http\Requests\EmployeeClearanceRequest;
use Modules\System\Employee\EmployeeClearance\Http\Requests\EmployeeClearanceUpdateStatusRequest as RequestsEmployeeClearanceUpdateStatusRequest;
use Modules\System\Employee\EmployeeClearance\Http\Resources\EmployeeClearanceResource;
use Modules\System\Employee\EmployeeClearance\Models\EmployeeClearance;
use Modules\System\Employee\EmployeeClearance\Services\EmployeeClearanceService;

class EmployeeClearanceController extends ApiController
{
    use ApiResponse;

    public static ?string $model = EmployeeClearance::class;

    public function __construct(protected EmployeeClearanceService $service)
    {
        parent::__construct();
    }

    public function index()
    {
        $data = $this->service->getPaginatedData($this->perPage);

        return $this->sendResponse(
            EmployeeClearanceResource::paginate($data),
            __('Data fetched successfully'),
            StatusCodeEnum::Success->value
        );
    }

    public function store(EmployeeClearanceRequest $request)
    {
        $data = $this->service->create($request);

        return $this->sendResponse(
            EmployeeClearanceResource::make($data),
            __('Data created successfully'),
            StatusCodeEnum::Created_successfully->value
        );
    }

    public function show(int $id)
    {
        $date = $this->service->show($id);

        return $this->sendResponse(
            EmployeeClearanceResource::make($date),
            __('Data fetched successfully'),
            StatusCodeEnum::Success->value
        );
    }

    public function update(EmployeeClearanceRequest $request, int $id)
    {
        $data = $this->service->update($request, $id);

        return $this->sendResponse(
            EmployeeClearanceResource::make($data),
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

    public function updateStatus(RequestsEmployeeClearanceUpdateStatusRequest $request, int $id)
    {
        $data = $this->service->updateStatus($request, $id);

        return $this->sendResponse(
            EmployeeClearanceResource::make($data),
            __('Data updated successfully'),
            StatusCodeEnum::Success->value
        );
    }
}
