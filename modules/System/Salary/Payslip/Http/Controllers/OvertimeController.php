<?php

namespace Modules\System\Salary\Overtime\Http\Controllers;

use Modules\Common\Enums\StatusCodeEnum;
use Modules\Common\Http\Controllers\ApiController;
use Modules\Common\Traits\ApiResponse;
use Modules\System\Salary\Overtime\Http\Requests\OvertimeRequest;
use Modules\System\Salary\Overtime\Http\Resources\OvertimeResource;
use Modules\System\Salary\Overtime\Models\Overtime;
use Modules\System\Salary\Overtime\Services\OvertimeService;

class OvertimeController extends ApiController
{
    use ApiResponse;

    public static ?string $model = Overtime::class;

    public function __construct(protected OvertimeService $service)
    {
        parent::__construct();
    }

    public function index()
    {
        $data = $this->service->getPaginatedData($this->perPage);

        return $this->sendResponse(
            OvertimeResource::paginate($data),
            __('Data fetched successfully'),
            StatusCodeEnum::Success->value
        );
    }

    public function store(OvertimeRequest $request)
    {
        $data = $this->service->create($request);

        return $this->sendResponse(
            OvertimeResource::make($data),
            __('Data created successfully'),
            StatusCodeEnum::Created_successfully->value
        );
    }

    public function show(Overtime $Overtime)
    {
        return $this->sendResponse(
            OvertimeResource::make($Overtime),
            __('Data fetched successfully'),
            StatusCodeEnum::Success->value
        );
    }

    public function update(OvertimeRequest $request, int $id)
    {
        $data = $this->service->update($request, $id);

        return $this->sendResponse(
            OvertimeResource::make($data),
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
