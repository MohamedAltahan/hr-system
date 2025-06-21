<?php

namespace Modules\System\Subscription\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Common\Traits\HasPagination;
use Modules\System\Price\Models\Price;
use Modules\System\Price\Resources\PriceResource;

class SubscriptionResource extends JsonResource
{
    use HasPagination;

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'company_id' => $this->tenant_id,
            'status' => $this->status->label(),
            'start_date' => formatDate($this->start_date),
            'end_date' => formatDate($this->end_date),
            'cancel_date' => formatDate($this->cancel_date),
            'plan_data' => PriceResource::make(new Price($this->plan_data)),
        ];
    }
}
