<?php

namespace Modules\Erp\Branch\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Common\Traits\HasPagination;

class BranchResource extends JsonResource
{
    use HasPagination;

    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'phone' => $this->phone,
            'address' => $this->address,
            'description' => $this->description,
            'is_active' => $this->is_active,
            'created_at' => $this->created_at,
        ];
    }
}
