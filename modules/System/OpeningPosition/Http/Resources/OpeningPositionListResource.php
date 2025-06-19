<?php

namespace Modules\System\OpeningPosition\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Common\Traits\HasPagination;

class OpeningPositionListResource extends JsonResource
{
    use HasPagination;

    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'position' => ['id' => $this->position?->id, 'name' => $this->position?->name],
            'number_of_vacancies' => $this->number_of_vacancies,
            'description' => $this->description,
            'number_of_new_applications' => $this->new_hiring_applications_count,
            'number_of_all_applications' => $this->hiring_applications_count,
        ];
    }
}
