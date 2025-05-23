<?php

namespace Modules\System\User\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Common\Traits\HasPagination;

class UserResource extends JsonResource
{
    use HasPagination;

    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'username' => $this->username,
            'email' => $this?->email,
            'phone' => $this?->phone,
            'birthday' => $this?->birthday,
            'national_id' => $this?->national_id,
            'employee_number' => $this?->employee_number,
            'avatar' => $this->avatar ? asset('storage/' . $this->avatar) : '',
            'gender' => __($this?->gender),
            'social_status' => __($this?->social_status),
            'hire_date' => $this?->hire_date,
            'address' => $this?->address,
            'is_active' => $this->is_active,
            'branch' => [
                'id' => $this->branch->id,
                'name' => $this->branch->name
            ],
            'direct_manager' => [
                'id' => $this?->directManager?->id,
                'name' => $this?->directManager?->name
            ],
            'department_name' => [
                'id' => $this?->department?->id,
                'name' => $this?->department?->name
            ],
            'job_title' => [
                'id' => $this?->jobTitle?->id,
                'name' => $this?->jobTitle?->name
            ],
            'position' => [
                'id' => $this?->position?->id,
                'name' => $this?->position?->name
            ],
            'translations' => $this->getTranslations(),
        ];
    }
}
