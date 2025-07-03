<?php

namespace Modules\System\Employee\Position\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Common\Traits\HasPagination;

class PositionResource extends JsonResource
{
    use HasPagination;

    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
        ];
    }
}
