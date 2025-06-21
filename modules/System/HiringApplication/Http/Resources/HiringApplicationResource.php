<?php

namespace Modules\System\HiringApplication\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Common\Traits\HasPagination;

class HiringApplicationResource extends JsonResource
{
    use HasPagination;

    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'opening_position' => ['id' => $this->openingPosition?->position->id, 'name' => $this->openingPosition?->position->name],
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'expected_salary' => $this->expected_salary,
            'current_salary' => $this->current_salary,
            'hire_date' => $this->hire_date,
            'contract' => $this->contract,
            'status' => $this->status ?? 'pending',
            'religion' => $this->religion,
            'nationality' => $this->nationality,
            'birthdate' => $this->birthdate,
            'notes' => $this->notes,
            'cv' => url('uploads/'.$this->cv),
            // 'number_of_applications' => $this->applications ?? null,
        ];
    }
}
