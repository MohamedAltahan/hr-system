<?php

namespace Modules\Erp\Permission\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Common\Traits\HasPagination;

class PermissionResource extends JsonResource
{
    use HasPagination;

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            // 'translation' => $this->getTranslationsWithNonEmpty(),
            'name' => $this->name,
            'group' => $this->group,
            'guard_name' => $this->guard_name,
        ];
    }
}
