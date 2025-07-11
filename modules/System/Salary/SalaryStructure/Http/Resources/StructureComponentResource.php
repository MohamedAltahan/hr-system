<?php

namespace Modules\System\Salary\SalaryStructure\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Common\Traits\HasPagination;

class StructureComponentResource extends JsonResource
{
    use HasPagination;

    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'type' => $this->type,
            'is_taxable' => $this->is_taxable,
            'value_type' => $this->pivot->value_type,
            'value' => $this->pivot->value,
            'base_component_id' => $this->pivot->base_component_id,

        ];
    }
}
