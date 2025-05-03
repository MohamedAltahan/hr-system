<?php

namespace Modules\System\Permission\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Common\Enums\StatusCodeEnum;
use Modules\Common\Http\Controllers\ApiController;
use Modules\System\Permission\Models\Permission;
use Modules\System\Permission\Resources\PermissionResource;
use Modules\System\Permission\Services\PermissionService;

class PermissionController extends ApiController
{
    public static ?string $model = Permission::class;

    public function __construct(protected PermissionService $permissionsService)
    {
        parent::__construct();
    }

    public function index()
    {
        $permissions = $this->permissionsService->getPermissions();

        return $this->sendResponse(
            PermissionResource::paginate($permissions),
            __('Data fetched successfully'),
            StatusCodeEnum::Success->value
        );
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
