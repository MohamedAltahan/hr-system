<?php

namespace Modules\System\Salary\SalaryStructure\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Common\Enums\StatusCodeEnum;
use Modules\Common\Http\Controllers\ApiController;
use Modules\Common\Traits\ApiResponse;
use Modules\System\Salary\SalaryStructure\Http\Requests\EmployeeSalaryRequest;
use Modules\System\Salary\SalaryStructure\Http\Requests\StructureComponentRequest;
use Modules\System\Salary\SalaryStructure\Http\Resources\StructureComponentResource;
use Modules\System\Salary\SalaryStructure\Models\StructureComponent;
use Modules\System\Salary\SalaryStructure\Services\StructureComponentService;

class EmployeeSalaryController extends ApiController
{
    use ApiResponse;

    public static ?string $model = StructureComponent::class;

    public function __construct(protected StructureComponentService $service)
    {
        parent::__construct();
    }

    public function index(Request $request)
    {
        $data = $this->service->getPaginatedData($request->employee_id, $this->perPage);

        return $this->sendResponse(
            StructureComponentResource::paginate($data),
            __('Data fetched successfully'),
            StatusCodeEnum::Success->value
        );
    }

    public function store(EmployeeSalaryRequest $request)
    {
        $data = $this->service->create($request);

        return $this->sendResponse(
            [],
            __('Data created successfully'),
            StatusCodeEnum::Created_successfully->value
        );
    }

    public function show(StructureComponent $StructureComponent)
    {
        return $this->sendResponse(
            StructureComponentResource::make($StructureComponent),
            __('Data fetched successfully'),
            StatusCodeEnum::Success->value
        );
    }

    public function update(StructureComponentRequest $request, int $id)
    {
        $data = $this->service->update($request, $id);

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
