<?php

namespace Modules\System\Price\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Common\Traits\HasPagination;

class PriceResource extends JsonResource
{
    use HasPagination;

    public function toArray($request)
    {

        return [
            'id' => $this->id,
            'price' => (int)$this->price,
            'duration_in_months' => $this->duration_in_months,
            'currency_code' => $this->currency_code,
        ];
    }
}
