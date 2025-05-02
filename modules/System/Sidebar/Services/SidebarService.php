<?php

namespace Modules\Erp\Sidebar\Services;

use Modules\Common\Filters\Common\JsonNameSearch;
use Modules\Erp\Sidebar\Models\Sidebar;

class SidebarService
{
    public function getSidebar()
    {
        return Sidebar::with('children')->whereNull('parent_id')->filter([JsonNameSearch::class])->get();
    }

    public static function getSidebarItem($id): Sidebar
    {
        $sidebar = Sidebar::where('id', $id)->first();

        return $sidebar;
    }

    public static function updateSidebarItem($request, $id): bool
    {
        $sidebarUpdateStatus = Sidebar::where('id', $id)->update($request->Validated());

        return $sidebarUpdateStatus;
    }
}
