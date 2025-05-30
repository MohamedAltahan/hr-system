<?php

namespace Modules\System\EmployeeAsset\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Common\Traits\HasPagination;
use Modules\System\User\Http\Resources\UserResource;

class EmployeeAssetResource extends JsonResource
{
    use HasPagination;

    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'employee' => UserResource::make($this->employee),
            'asset_type' => [
                'id' => $this->asset->id,
                'name' => $this->asset->name,
            ],
            'manager' => [
                'id' => $this->manager->id,
                'name' => $this->manager->name,
            ],
            'issue_date' => formatDate($this->issue_date),
            'return_date' => formatDate($this->return_date),
        ];
    }
}
