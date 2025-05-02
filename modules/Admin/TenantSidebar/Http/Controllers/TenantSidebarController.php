<?php

namespace Modules\Admin\TenantSidebar\Http\Controllers;

use Modules\Admin\TenantSidebar\Http\Requests\TenantSidebarRequest;
use Modules\Admin\TenantSidebar\Resources\TenantSidebarResource;
use Modules\Admin\TenantSidebar\Services\TenantSidebarService;
use Modules\Common\Enums\StatusCodeEnum;
use Modules\Common\Http\Controllers\ApiController;
use Modules\Common\Traits\ApiResponse;

class TenantSidebarController extends ApiController
{
    use ApiResponse;

    public function index()
    {
        $sidebar = TenantSidebarService::getTenantSidebar();

        return $this->sendResponse(
            TenantSidebarResource::collection($sidebar),
            __('Data fetched successfully'),
            StatusCodeEnum::Success->value
        );
    }

    public function show($id)
    {
        $sidebarItem = TenantSidebarService::getTenantSidebarItem($id);

        return $this->sendResponse(
            TenantSidebarResource::make($sidebarItem),
            __('Data fetched successfully'),
            StatusCodeEnum::Success->value
        );
    }

    public function update(TenantSidebarRequest $request, $id)
    {
        $sidebarItem = TenantSidebarService::updateTenantSidebarItem($request, $id);

        return $this->sendResponse(
            TenantSidebarResource::make($sidebarItem),
            __('Data updated successfully'),
            StatusCodeEnum::Success->value
        );
    }

    public function destroy($id)
    {
        //
    }
}
