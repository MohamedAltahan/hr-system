<?php

namespace Modules\System\Sidebar\Services;

use Modules\Common\Enums\GuardEnum;
use Modules\Common\Filters\Common\JsonNameSearch;
use Modules\System\Sidebar\Models\Sidebar;

class SidebarService
{
    public function getSidebar($request)
    {
        $user = auth(GuardEnum::TENANTUSER->value)->user();

        $sidebarItems = Sidebar::with('children')->whereNull('parent_id')->filter([JsonNameSearch::class])->get();

        $allowedSidebarItems = $sidebarItems->filter(function ($parent) use ($user) {

            $parent->children = $parent->children->filter(function ($child) use ($user) {
                return $user->can($child->permission_name);
            })->values();

            return $parent->children->isNotEmpty();
        })->values();

        return $allowedSidebarItems;
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
