<?php

namespace Modules\Admin\Plan\Services;

use Illuminate\Support\Facades\DB;
use Modules\Admin\Plan\Models\Plan;
use Modules\Admin\TenantPermission\Models\TenantPermission;
use Modules\Admin\TenantSidebar\Models\TenantSidebar;
use Modules\Common\Traits\Filterable;

class PlanService
{
    use Filterable;

    public static function getPaginatedPlans($perPage)
    {
        $plan = DB::connection('admin')->table('plans')->where('id', 2)->first();

        $permissions = json_decode($plan->permissions, true);
        $sidebarItems = json_decode($plan->sidebar_items, true);
        foreach ($sidebarItems as $sidebarItem) {

            dd($sidebarItem['name']);
        }

        $plans = Plan::paginate($perPage);

        return $plans;
    }

    public static function storePlan($request)
    {
        $permission_ids = $request->input('permission_ids');
        $sidebar_item_ids = $request->input('sidebar_item_ids');

        $permissions = TenantPermission::whereIn('id', $permission_ids)->get()->toArray();
        $sidebarItems = TenantSidebar::whereIn('id', $sidebar_item_ids)->get()->toArray();

        $request->merge(['permissions' => $permissions, 'sidebar_items' => $sidebarItems]);

        $plan = Plan::create($request->all());

        return $plan;
    }

    public static function getPlan($id)
    {
        $plan = Plan::find($id);

        return $plan;
    }

    public static function updatePlan($request, $id)
    {
        $plan = Plan::find($id);
        $plan->update($request->all());

        return $plan;
    }
}
