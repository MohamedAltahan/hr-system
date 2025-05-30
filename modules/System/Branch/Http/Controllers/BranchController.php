<?php

namespace Modules\System\Branch\Http\Controllers;

use Modules\Common\Enums\StatusCodeEnum;
use Modules\Common\Http\Controllers\ApiController;
use Modules\Common\Traits\ApiResponse;
use Modules\System\Branch\Http\Requests\BranchRequest;
use Modules\System\Branch\Http\Resources\BranchResource;
use Modules\System\Branch\Models\Branch;
use Modules\System\Branch\Services\BranchService;

class BranchController extends ApiController
{
    use ApiResponse;

    public function __construct(protected BranchService $service)
    {
        parent::__construct();
    }

    public function index()
    {
        $branchs = $this->service->getPaginatedBranchs($this->perPage);

        return $this->sendResponse(
            BranchResource::paginate($branchs),
            __('Data fetched successfully'),
            StatusCodeEnum::Success->value
        );
    }

    public function store(BranchRequest $request)
    {
        $data = $this->service->create($request);

        return $this->sendResponse(
            BranchResource::make($data),
            __('Data created successfully'),
            StatusCodeEnum::Created_successfully->value
        );
    }

    public function show(Branch $branch)
    {
        return $this->sendResponse(
            BranchResource::make($branch),
            __('Data fetched successfully'),
            StatusCodeEnum::Success->value
        );
    }

    public function update(BranchRequest $request, Branch $branch)
    {
        $data = $this->service->update($request, $branch);

        return $this->sendResponse(
            BranchResource::make($data),
            __('Data updated successfully'),
            StatusCodeEnum::Success->value
        );
    }

    public function destroy(Branch $branch)
    {
        $this->service->destroy($branch);

        return $this->sendResponse(
            [],
            __('Data deleted successfully'),
            StatusCodeEnum::Success->value
        );
    }
}
