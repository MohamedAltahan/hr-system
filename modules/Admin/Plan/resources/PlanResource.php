<?php

namespace Modules\Admin\Plan\Resources;

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
            'interval' => $this->interval,
            'is_popular' => $this->is_popular,
            'limits' => $this->limits,
            'permissions' => $this->permissions,
            'sidebar_items' => $this->sidebar_items,
        ];
    }
}
