<?php

namespace Modules\System\Subscription\Services;

use Illuminate\Support\Facades\DB;
use Modules\Common\Traits\Filterable;
use Modules\System\Price\Models\Price;
use Modules\System\Subscription\Enum\SubscriptionStatus;
use Modules\System\Subscription\Models\Subscription;
use Modules\System\Tenant\Models\Tenant;

class SubscriptionService
{
    use Filterable;

    public static function getPaginatedData($perPage)
    {
        $tenantId = request('company_id') ?? null;

        $data = tenancy()->central(function () use ($tenantId, $perPage) {
            return Subscription::where('is_active', 1)->where('tenant_id', $tenantId)->orderBy('order', 'asc')->paginate($perPage);
        });

        return $data;
    }

    public static function storeSubscription($request)
    {
        $data = tenancy()->central(function () use ($request) {

            $tenant = Tenant::findOrFail($request->company_id);
            $price = Price::findOrFail($request->price_id);
            $currentSubscription = $tenant->currentSubscription()->first();
            DB::beginTransaction();

            if ($currentSubscription && $currentSubscription['status']->value == SubscriptionStatus::ACTIVE->value) {
                // expire current subscription
                $currentSubscription->update([
                    'status' => SubscriptionStatus::EXPIRED->value,
                    'ends_at' => now(),
                ]);
            }

            $subscription = $tenant->subscriptions()->create([
                'tenant_id' => $tenant->id,
                'status' => SubscriptionStatus::ACTIVE->value,
                'start_date' => now(),
                'end_date' => now()->addMonths($price->duration_in_months),
                'cancel_date' => null,
                'plan_data' => $price->toArray() + ['currency_translated' => config('currencies')[$price?->currency_code]],
            ]);

            DB::commit();

            return $subscription;
        });

        return $data;
    }

    public static function getSubscriptions($tenantId, $perPage)
    {
        $data = tenancy()->central(function () use ($tenantId, $perPage) {

            $tenant = Tenant::findOrFail($tenantId);

            return $tenant->subscriptions()->paginate($perPage);
        });

        return $data;
    }

    public static function updateSubscription($request, $id)
    {
        $data = tenancy()->central(function () use ($id, $request) {
            $plan = Subscription::findOrFail($id);

            return $plan->update($request->all());
        });

        return $data;
    }
}
