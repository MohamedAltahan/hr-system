<?php

namespace Modules\Admin\TenantSidebar\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TenantSidebarResource extends JsonResource
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
            'children' => $this->children,
        ];
    }
}
