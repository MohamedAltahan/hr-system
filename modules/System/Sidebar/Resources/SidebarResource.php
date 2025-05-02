<?php

namespace Modules\Erp\Sidebar\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SidebarResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'route' => $this->route,
            'icon' => $this->icon,
            'is_active' => $this->is_active,
            'order' => $this->order,
            'parent_id' => $this->parent_id,
            'permission' => $this->permission ?? [],
            'children' => self::collection($this->children),
        ];
    }
}
