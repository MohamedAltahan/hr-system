<?php

namespace Modules\System\Salary\LeavesSalary\Http\Controllers;

use Modules\Common\Enums\StatusCodeEnum;
use Modules\Common\Http\Controllers\ApiController;
use Modules\Common\Traits\ApiResponse;
use Modules\System\Salary\LeavesSalary\Http\Requests\LeavesSalaryRequest;
use Modules\System\Salary\LeavesSalary\Http\Resources\LeavesSalaryListResource;
use Modules\System\Salary\LeavesSalary\Http\Resources\LeavesSalaryResource;
use Modules\System\Salary\LeavesSalary\Models\LeavesSalary;
use Modules\System\Salary\LeavesSalary\Services\LeavesSalaryService;

class LeavesSalaryController extends ApiController
{
    use ApiResponse;

    public static ?string $model = LeavesSalary::class;

    public function __construct(protected LeavesSalaryService $service)
    {
        parent::__construct();
    }

    public function index()
    {
        $data = $this->service->getPaginatedData($this->perPage);

        return $this->sendResponse(
            LeavesSalaryResource::paginate($data),
            __('Data fetched successfully'),
            StatusCodeEnum::Success->value
        );
    }

    public function store(LeavesSalaryRequest $request)
    {
        $data = $this->service->create($request);

        return $this->sendResponse(
            LeavesSalaryResource::make($data),
            __('Data created successfully'),
            StatusCodeEnum::Created_successfully->value
        );
    }

    public function show(LeavesSalary $LeavesSalary)
    {
        return $this->sendResponse(
            LeavesSalaryResource::make($LeavesSalary),
            __('Data fetched successfully'),
            StatusCodeEnum::Success->value
        );
    }

    public function update(LeavesSalaryRequest $request, int $id)
    {
        $data = $this->service->update($request, $id);

        return $this->sendResponse(
            LeavesSalaryResource::make($data),
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

    public function getLeavesSalarys()
    {

        $openingPositions = LeavesSalary::where('is_published', 1)->get();

        return $this->sendResponse(
            LeavesSalaryListResource::collection($openingPositions),
            __('Data fetched successfully'),
            StatusCodeEnum::Success->value
        );
    }
}
