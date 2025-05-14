<?php

namespace Modules\System\Permission\Http\Controllers;

use Modules\Common\Enums\StatusCodeEnum;
use Modules\Common\Http\Controllers\ApiController;
use Modules\System\Permission\Http\Requests\RoleRequest;
use Modules\System\Permission\Http\Resources\RoleResource;
use Modules\System\Permission\Models\Role;

use Modules\System\Permission\Services\RoleService;

class RoleController extends ApiController
{
    public static ?string $model = Role::class;

    public function __construct(protected RoleService $roleService)
    {
        parent::__construct();
    }

    public function index()
    {
        $roles = $this->roleService->getRoles();

        return $this->sendResponse(
            RoleResource::paginate($roles),
            __('Data fetched successfully'),
            StatusCodeEnum::Success->value
        );
    }

    public function store(RoleRequest $request)
    {
        $this->roleService->storeRoleWithPermissions($request);

        return $this->sendResponse(
            [],
            __('Data created successfully'),
            StatusCodeEnum::Success->value
        );
    }

    public function show(Role $role)
    {
        return $this->sendResponse(
            RoleResource::make($role),
            __('Data fetched successfully'),
            StatusCodeEnum::Success->value
        );
    }

    public function update(RoleRequest $request, $id)
    {
        $this->roleService->updateRoleWithPermissions($request, $id);

        return $this->sendResponse(
            [],
            __('Data updated successfully'),
            StatusCodeEnum::Success->value
        );
    }

    public function destroy($id)
    {
        $deleteStatus = $this->roleService->destroy($id);

        if (! $deleteStatus) {
            return $this->sendResponse(
                [],
                __('Cannot delete role because it is in use'),
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
