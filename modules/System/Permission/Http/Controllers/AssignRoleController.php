<?php

namespace Modules\Erp\Permission\Http\Controllers;

use Modules\Common\Enums\StatusCodeEnum;
use Modules\Common\Http\Controllers\ApiController;
use Modules\Common\Traits\ApiResponse;
use Modules\Erp\Permission\Http\Requests\assignRoleRequest;
use Modules\Erp\Permission\Resources\RoleResource;
use Modules\Erp\Permission\Services\AssignRoleService;
use Modules\Erp\User\Models\User;

class AssignRoleController extends ApiController
{
    use ApiResponse;

    public function __construct(protected AssignRoleService $assignRoleService)
    {
        parent::__construct();
    }

    public function store(assignRoleRequest $request)
    {
        $this->assignRoleService->assignRole($request);

        return $this->sendResponse(
            [],
            __('Data saved successfully'),
            StatusCodeEnum::Success->value
        );
    }

    public function show($id)
    {
        $userRoles =  $this->assignRoleService->getUserRoles($id);

        return $this->sendResponse(
            RoleResource::collection($userRoles),
            __('Data fetched successfully'),
            StatusCodeEnum::Success->value
        );
    }
}
