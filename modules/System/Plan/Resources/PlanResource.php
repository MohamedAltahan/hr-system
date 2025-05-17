<?php

namespace Modules\System\Plan\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Common\Traits\HasPagination;

class PlanResource extends JsonResource
{
    use HasPagination;

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'price_after_discount' => $this->price_after_discount,
            'is_active' => $this->is_active,
            'features' => $this->features,
            'duration_in_months' => $this->duration_in_months,
            'is_popular' => $this->is_popular,
            'currency' => $this->currency,
            'is_trial' => $this->is_trial,
            'trial_days' => $this->trial_days,
            'order' => $this->order,
        ];
    }
}
