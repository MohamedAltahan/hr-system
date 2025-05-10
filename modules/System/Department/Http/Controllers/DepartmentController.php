<?php

namespace Modules\System\Department\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Modules\Common\Enums\StatusCodeEnum;
use Modules\Common\Enums\UserRoleEnum;
use Modules\Common\Http\Controllers\ApiController;
use Modules\Common\Traits\ApiResponse;
use Modules\System\Department\Http\Requests\DepartmentRequest;
use Modules\System\Department\Http\Resources\DepartmentResource;
use Modules\System\Department\Models\Department;
use Modules\System\Department\Services\DepartmentService;


class DepartmentController extends ApiController
{
    use ApiResponse;

    public static ?string $model = Department::class;

    public function __construct(protected DepartmentService $service)
    {
        parent::__construct();
    }

    public function index()
    {
        $data = $this->service->getPaginatedData($this->perPage);

        return $this->sendResponse(
            DepartmentResource::paginate($data),
            __('Data fetched successfully'),
            StatusCodeEnum::Success->value
        );
    }

    public function store(DepartmentRequest $request)
    {
        $this->service->create($request, new Department);

        return $this->sendResponse(
            [],
            __('Data created successfully'),
            StatusCodeEnum::Created_successfully->value
        );
    }

    public function show(Department $model)
    {
        return $this->sendResponse(
            DepartmentResource::make($model),
            __('Data fetched successfully'),
            StatusCodeEnum::Success->value
        );
    }

    public function update(DepartmentRequest $request, Department $model, DepartmentService $service)
    {
        $service->update($request, $model);

        return $this->sendResponse(
            [],
            __('Data updated successfully'),
            StatusCodeEnum::Success->value
        );
    }

    public function destroy(int $id)
    {
        $deleteStatus = $this->service->destroy($id);

        if (!$deleteStatus) {
            return $this->sendError(
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
