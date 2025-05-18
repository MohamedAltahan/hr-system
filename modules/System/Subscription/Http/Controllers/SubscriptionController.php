<?php

namespace Modules\System\Subscription\Http\Controllers;

use Illuminate\Support\Facades\Request;
use Modules\Common\Enums\StatusCodeEnum;
use Modules\Common\Http\Controllers\ApiController;
use Modules\Common\Traits\ApiResponse;
use Modules\System\Subscription\Http\Requests\SubscriptionRequest;
use Modules\System\Subscription\Resources\SubscriptionResource;
use Modules\System\Subscription\Services\SubscriptionService;

class SubscriptionController extends ApiController
{
    use ApiResponse;

    public function __construct(protected SubscriptionService $service)
    {
        parent::__construct();
    }

    public function store(SubscriptionRequest $request)
    {
        $plan = SubscriptionService::storeSubscription($request);

        return $this->sendResponse(
            SubscriptionResource::make($plan),
            __('Data created successfully'),
            StatusCodeEnum::Success->value
        );
    }

    public function show($id)
    {
        $subscriptions = $this->service->getSubscriptions($id, $this->perPage);

        return $this->sendResponse(
            SubscriptionResource::paginate($subscriptions),
            __('Data fetched successfully'),
            StatusCodeEnum::Success->value
        );
    }
}
