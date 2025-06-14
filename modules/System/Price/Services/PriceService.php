<?php

namespace Modules\System\Price\Services;

use Modules\Common\Traits\Filterable;
use Modules\System\Price\Models\Price;

class PriceService
{
    use Filterable;

    public static function getData()
    {
        $tenantId = request('company_id') ?? null;
        $data = tenancy()->central(function () use ($tenantId) {

            $prices = Price::where('tenant_id', $tenantId)
                ->when(request('status') == 'active', function ($query) {
                    $query->where('is_active', 1);
                })->first();

            return $prices;
        });

        return $data;
    }

    public static function assignPriceToTenant($request)
    {
        $data = tenancy()->central(function () use ($request) {

            $newPriceData['tenant_id'] = $request->company_id;
            $newPriceData['price'] = $request->price;
            $newPriceData['currency_code'] = $request->currency_code;
            $newPriceData['duration_in_months'] = $request->duration_in_months;
            $newPrice = Price::updateOrCreate(['tenant_id' => $request->company_id], $newPriceData);

            return $newPrice;
        });

        return $data;
    }

    public static function destroy($id)
    {
        $data = tenancy()->central(function () use ($id) {
            $plan = Price::findOrFail($id);

            return $plan->delete();
        });

        return $data;
    }
}
