<?php

namespace Modules\System\Leaves\Leaves\Http\Controllers;

use Modules\Common\Enums\StatusCodeEnum;
use Modules\Common\Http\Controllers\ApiController;
use Modules\Common\Traits\ApiResponse;
use Modules\System\EmployeeRequest\Models\EmployeeRequest;
use Modules\System\Leaves\Leaves\Http\Requests\LeavesRequest;
use Modules\System\Leaves\Leaves\Http\Resources\LeavesListResource;
use Modules\System\Leaves\Leaves\Http\Resources\LeavesResource;
use Modules\System\Leaves\Leaves\Models\Leaves;
use Modules\System\Leaves\Leaves\Services\LeavesService;

class LeavesController extends ApiController
{
    use ApiResponse;

    public static ?string $model = Leaves::class;

    public function __construct(protected LeavesService $service)
    {
        parent::__construct();
    }

    public function index()
    {
        $data = $this->service->getPaginatedData($this->perPage);

        return $this->sendResponse(
            LeavesResource::paginate($data),
            __('Data fetched successfully'),
            StatusCodeEnum::Success->value
        );
    }

    public function store(LeavesRequest $request)
    {
        $data = $this->service->create($request);

        return $this->sendResponse(
            LeavesResource::make($data),
            __('Data created successfully'),
            StatusCodeEnum::Created_successfully->value
        );
    }

    public function show(int $id)
    {
        $Leaves = EmployeeRequest::where('type', 'leave')->with('employee')->findOrFail($id);

        return $this->sendResponse(
            LeavesResource::make($Leaves),
            __('Data fetched successfully'),
            StatusCodeEnum::Success->value
        );
    }

    public function update(LeavesRequest $request, int $id)
    {
        $data = $this->service->update($request, $id);

        return $this->sendResponse(
            LeavesResource::make($data),
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
