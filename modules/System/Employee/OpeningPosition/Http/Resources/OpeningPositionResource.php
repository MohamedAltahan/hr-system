<?php

namespace Modules\System\Employee\OpeningPosition\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Common\Traits\HasPagination;

class OpeningPositionResource extends JsonResource
{
    use HasPagination;

    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'position' => [$this->position?->id, $this->position?->name],
            'number_of_vacancies' => $this->number_of_vacancies,
            'website' => env('APP_URL') . '/' . 'apply-job?' . 'c=' . tenant()->domain,
            'description' => $this->description,
            'is_published' => $this->is_published,
            'department' => ['id' => $this->department?->id, 'name' => $this->department?->name],
            'number_of_new_applications' => $this->new_hiring_applications_count,
            'number_of_all_applications' => $this->hiring_applications_count,
        ];
    }
}
