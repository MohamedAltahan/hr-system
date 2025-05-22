<?php

namespace Modules\System\Sidebar\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SidebarResource extends JsonResource
{
    public function toArray($request)
    {
        $fullRoute = $this->route ? route($this->route) : '';
        $sectionUrl = '';

        if ($fullRoute && preg_match('#/v1/(.+)$#', $fullRoute, $matches)) {
            $sectionUrl = $matches[1]; // This will capture whatever comes after /v1/
        }

        return [
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'route' => $sectionUrl,
            'icon' => $this->icon,
            'is_active' => $this->is_active,
            'order' => $this->order,
            'parent_id' => $this->parent_id,
            'permission_name' => $this->permission_name,
            'children' => self::collection($this->children),
        ];
    }
}
