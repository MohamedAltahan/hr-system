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
            'name' => $this->name,
            'description' => $this->description,
            'employees_count' => $this->users_count,
            'manager' => UserResource::make($this->manager),
            'translations' => $this->translateAttributes(),
        ];
    }
}
