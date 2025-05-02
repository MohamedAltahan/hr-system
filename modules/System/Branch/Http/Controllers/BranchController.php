<?php

namespace Modules\Erp\Branch\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Modules\Common\Enums\StatusCodeEnum;
use Modules\Common\Enums\UserRoleEnum;
use Modules\Common\Http\Controllers\ApiController;
use Modules\Common\Traits\ApiResponse;
use Modules\Erp\Branch\Http\Requests\BranchRequest;
use Modules\Erp\Branch\Http\Resources\BranchResource;
use Modules\Erp\Branch\Models\Branch;
use Modules\Erp\Branch\Services\BranchService;

class BranchController extends ApiController
{
    use ApiResponse;

    public static ?string $model = Branch::class;

    public function __construct(protected BranchService $branchService)
    {
        parent::__construct();
    }

    public function index()
    {
        $branchs = $this->branchService->getPaginatedBranchs($this->perPage);

        return $this->sendResponse(
            BranchResource::paginate($branchs),
            __('Data fetched successfully'),
            StatusCodeEnum::Success->value
        );
    }

    public function store(BranchRequest $request, BranchService $branchService)
    {
        $branchService->create($request, new Branch);

        return $this->sendResponse(
            [],
            __('Data created successfully'),
            StatusCodeEnum::Created_successfully->value
        );
    }

    public function show(Branch $branch)
    {
        // $this->authorize('view', $branch);

        // $this->user = Auth::user();

        if (static::$model && (Auth::user()?->role != UserRoleEnum::SuperAdmin->value)) {
            $this->authorizeResource(static::$model, Str::snake(class_basename(static::$model)));
        }

        return $this->sendResponse(
            BranchResource::make($branch),
            __('Data fetched successfully'),
            StatusCodeEnum::Success->value
        );
    }

    public function update(BranchRequest $request, Branch $branch, BranchService $branchService)
    {
        $branchService->update($request, $branch);

        return $this->sendResponse(
            [],
            __('Data updated successfully'),
            StatusCodeEnum::Success->value
        );
    }

    public function destroy(Branch $branch)
    {
        $this->branchService->destroy($branch);

        return $this->sendResponse(
            [],
            __('Data deleted successfully'),
            StatusCodeEnum::Success->value
        );
    }
}
