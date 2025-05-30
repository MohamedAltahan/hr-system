<?php

namespace Modules\System\EmployeeAssetType\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Common\Traits\HasPagination;

class EmployeeAssetTypeResource extends JsonResource
{
    use HasPagination;

    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'branch' => [
                'id' => $this->branch->id,
                'name' => $this->branch->name,
            ],
        ];
    }
}
