<?php

namespace Modules\System\Price\Http\Controllers;

use Modules\Common\Enums\StatusCodeEnum;
use Modules\Common\Http\Controllers\ApiController;
use Modules\Common\Traits\ApiResponse;
use Modules\System\Price\Http\Requests\AssignPriceToTenantRequest;
use Modules\System\Price\Http\Requests\PriceRequest;
use Modules\System\Price\Resources\PriceResource;
use Modules\System\Price\Services\PriceService;

class PriceController extends ApiController
{
    use ApiResponse;

    public function __construct(protected PriceService $service)
    {
        parent::__construct();
    }

    public function index()
    {
        $price = $this->service->getData();

        return $this->sendResponse(
            PriceResource::make($price),
            __('Data fetched successfully'),
            StatusCodeEnum::Success->value
        );
    }

    public function assignPriceToTenant(AssignPriceToTenantRequest $request)
    {
        $data = $this->service->assignPriceToTenant($request);

        return $this->sendResponse(
            PriceResource::make($data),
            __('Data created successfully'),
            StatusCodeEnum::Created_successfully->value
        );
    }

    public function destroy($id)
    {
        $this->service->destroy($id);

        return $this->sendResponse(
            [],
            __('Data deleted successfully'),
            StatusCodeEnum::Success->value
        );
    }
}
