<?php

namespace Modules\Erp\Sidebar\Http\Controllers;

use Modules\Common\Enums\StatusCodeEnum;
use Modules\Common\Http\Controllers\ApiController;
use Modules\Common\Traits\ApiResponse;
use Modules\Erp\Sidebar\Http\Requests\SidebarRequest;
use Modules\Erp\Sidebar\Resources\SidebarResource;
use Modules\Erp\Sidebar\Services\SidebarService;

class SidebarController extends ApiController
{
    use ApiResponse;

    public function __construct(protected SidebarService $sidebarService)
    {
        parent::__construct();
    }

    public function index()
    {
        $sidebar = $this->sidebarService->getSidebar();

        return $this->sendResponse(
            SidebarResource::collection($sidebar),
            __('Data fetched successfully'),
            StatusCodeEnum::Success->value
        );
    }

    public function show($id)
    {
        $sidebarItem = $this->sidebarService->getSidebarItem($id);

        return $this->sendResponse(
            SidebarResource::make($sidebarItem),
            __('Data fetched successfully'),
            StatusCodeEnum::Success->value
        );
    }

    public function update(SidebarRequest $request, $id)
    {
        $this->sidebarService->updateSidebarItem($request, $id);

        return $this->sendResponse(
            [],
            __('Data updated successfully'),
            StatusCodeEnum::Success->value
        );
    }
}
