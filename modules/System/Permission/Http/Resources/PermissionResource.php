<?php

namespace Modules\System\Permission\Http\Resources;

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
            'name' => $this->name,
            'group' => $this->group,
        ];
    }
}
