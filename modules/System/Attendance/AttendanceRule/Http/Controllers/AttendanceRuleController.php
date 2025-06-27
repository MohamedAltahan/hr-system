<?php

namespace Modules\System\Attendance\AttendanceRule\Http\Controllers;

use Modules\Common\Enums\StatusCodeEnum;
use Modules\Common\Http\Controllers\ApiController;
use Modules\Common\Traits\ApiResponse;
use Modules\System\Attendance\AttendanceRule\Http\Requests\AttendanceRuleRequest;
use Modules\System\Attendance\AttendanceRule\Http\Resources\AttendanceRuleResource;
use Modules\System\Attendance\AttendanceRule\Models\AttendanceRule;
use Modules\System\Attendance\AttendanceRule\Services\AttendanceRuleService;

class AttendanceRuleController extends ApiController
{
    use ApiResponse;

    public static ?string $model = AttendanceRule::class;

    public function __construct(protected AttendanceRuleService $service)
    {
        parent::__construct();
    }

    public function index()
    {
        $data = $this->service->getPaginatedData($this->perPage);

        return $this->sendResponse(
            AttendanceRuleResource::paginate($data),
            __('Data fetched successfully'),
            StatusCodeEnum::Success->value
        );
    }

    public function store(AttendanceRuleRequest $request)
    {
        $data = $this->service->create($request);

        return $this->sendResponse(
            AttendanceRuleResource::make($data),
            __('Data created successfully'),
            StatusCodeEnum::Created_successfully->value
        );
    }

    public function show($id)
    {
        $data = $this->service->show($id);

        return $this->sendResponse(
            AttendanceRuleResource::make($data),
            __('Data fetched successfully'),
            StatusCodeEnum::Success->value
        );
    }

    public function update(AttendanceRuleRequest $request, int $id)
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
