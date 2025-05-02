<?php

namespace Modules\Erp\Permission\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Common\Traits\HasPagination;

class RoleResource extends JsonResource
{
    use HasPagination;

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'translation' => $this->getTranslationsWithNonEmpty(),
            'name' => $this->name,
            'guard_name' => $this->guard_name,
            'permissions' => PermissionResource::collection($this->permissions),
        ];
    }
}
