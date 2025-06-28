<?php

namespace Modules\System\Attendance\AttendanceDepartureRequest\Http\Controllers;

use Modules\Common\Enums\StatusCodeEnum;
use Modules\Common\Http\Controllers\ApiController;
use Modules\Common\Traits\ApiResponse;
use Modules\System\Attendance\AttendanceDepartureRequest\Http\Requests\AttendanceDepartureRequestRequest;
use Modules\System\Attendance\AttendanceDepartureRequest\Http\Requests\AttendanceDepartureRequestUpdateRequest;
use Modules\System\Attendance\AttendanceDepartureRequest\Http\Resources\AttendanceDepartureRequestResource;
use Modules\System\Attendance\AttendanceDepartureRequest\Models\AttendanceDepartureRequest;
use Modules\System\Attendance\AttendanceDepartureRequest\Services\AttendanceDepartureRequestService;
use Modules\System\EmployeeRequest\Http\Resources\EmployeeRequestResource;


class AttendanceDepartureRequestController extends ApiController
{
    use ApiResponse;

    public static ?string $model = AttendanceDepartureRequest::class;

    public function __construct(protected AttendanceDepartureRequestService $service)
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

    public function show($id)
    {
        $data = $this->service->show($id);

        return $this->sendResponse(
            EmployeeRequestResource::make($data),
            __('Data fetched successfully'),
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
