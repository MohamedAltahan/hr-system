<?php

namespace Modules\System\EmployeeContract\Http\Controllers;

use Modules\Common\Enums\StatusCodeEnum;
use Modules\Common\Http\Controllers\ApiController;
use Modules\Common\Traits\ApiResponse;
use Modules\System\EmployeeContract\Http\Requests\EmployeeContractRequest;
use Modules\System\EmployeeContract\Http\Resources\EmployeeContractResource;
use Modules\System\EmployeeContract\Models\EmployeeContract;
use Modules\System\EmployeeContract\Services\EmployeeContractService;

class EmployeeContractController extends ApiController
{
    use ApiResponse;

    public static ?string $model = EmployeeContract::class;

    public function __construct(protected EmployeeContractService $service)
    {
        parent::__construct();
    }

    public function index()
    {
        $data = $this->service->getPaginatedData($this->perPage);

        return $this->sendResponse(
            EmployeeContractResource::paginate($data),
            __('Data fetched successfully'),
            StatusCodeEnum::Success->value
        );
    }

    public function store(EmployeeContractRequest $request)
    {
        $data = $this->service->create($request);

        return $this->sendResponse(
            EmployeeContractResource::make($data),
            __('Data created successfully'),
            StatusCodeEnum::Created_successfully->value
        );
    }

    public function show(int $id)
    {
        $date = $this->service->show($id);

        return $this->sendResponse(
            EmployeeContractResource::make($date),
            __('Data fetched successfully'),
            StatusCodeEnum::Success->value
        );
    }

    public function update(EmployeeContractRequest $request, int $id)
    {
        $data = $this->service->update($request, $id);

        return $this->sendResponse(
            EmployeeContractResource::make($data),
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
