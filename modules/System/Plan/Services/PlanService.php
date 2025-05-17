<?php

namespace Modules\System\Plan\Services;

use Illuminate\Support\Facades\DB;
use Modules\Central\TenantPermission\Models\TenantPermission;
use Modules\Central\TenantSidebar\Models\TenantSidebar;
use Modules\Common\Traits\Filterable;
use Modules\System\Plan\Models\Plan;

class PlanService
{
    use Filterable;

    public static function getPaginatedData($perPage)
    {
        $tenantId = request('company_id') ?? null;

        $data = tenancy()->central(function () use ($tenantId, $perPage) {
            return Plan::where('is_active', 1)->where('tenant_id', $tenantId)->orderBy('order', 'asc')->paginate($perPage);
        });

        return $data;
    }

    public static function storePlan($request)
    {
        $tenantId = request('company_id') ?? null;

        $data = tenancy()->central(function () use ($request, $tenantId) {
            $request->merge(['tenant_id' => $tenantId]);
            return Plan::create($request->all());
        });

        return $data;
    }

    public static function getPlan($id)
    {
        $data = tenancy()->central(function () use ($id) {
            return Plan::findOrFail($id);
        });

        return $data;
    }

    public static function updatePlan($request, $id)
    {
        $data = tenancy()->central(function () use ($id, $request) {
            $plan = Plan::findOrFail($id);
            return $plan->update($request->all());
        });

        return $data;
    }
}
