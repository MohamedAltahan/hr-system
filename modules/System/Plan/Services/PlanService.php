<?php

namespace Modules\System\Plan\Services;

use Modules\Common\Traits\Filterable;
use Modules\System\Plan\Models\Plan;

class PlanService
{
    use Filterable;

    public static function getPaginatedData($perPage)
    {
        $tenantId = request('company_id') ?? null;

        $data = tenancy()->central(function () use ($tenantId, $perPage) {

            $plans = Plan::where('tenant_id', $tenantId)
                ->when(request('status') == 'active', function ($query) {
                    $query->where('is_active', 1);
                })->orderBy('order', 'asc')->paginate($perPage);

            return $plans;
        });

        return $data;
    }

    public function getActivePlans()
    {
        return $data = tenancy()->central(function () {
            return Plan::where('is_active', 1)->orderBy('order', 'asc')->get();
        });
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

    public static function assignPlanToTenant($request)
    {
        $data = tenancy()->central(function () use ($request) {

            $mainPlan = Plan::findOrFail($request->plan_id);
            $newPlanData = $mainPlan->toArray();
            unset($newPlanData['id']);
            $newPlanData['tenant_id'] = $request->company_id;
            $newPlan = Plan::create($newPlanData);
            $oldPlan = Plan::where('tenant_id', $request->company_id)->where('id', '!=', $newPlan->id)->delete();
            return $newPlan;
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

    public static function destroy($id)
    {
        $data = tenancy()->central(function () use ($id) {
            $plan = Plan::findOrFail($id);

            return $plan->delete();
        });

        return $data;
    }
}
