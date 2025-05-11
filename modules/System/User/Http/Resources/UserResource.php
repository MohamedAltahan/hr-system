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
            'branch' => $this->branch->name,
            'username' => $this->username,
            'email' => $this?->email,
            'phone' => $this?->phone,
            'birthday' => $this?->birthday,
            'national_id' => $this?->national_id,
            'employee_number' => $this?->employee_number,
            'avatar' => $this->avatar ? asset('storage/' . $this->avatar) : '',
            'roles' => $this->role->label(),
            'gender' => __($this?->gender),
            'social_status' => __($this?->social_status),
            'hire_date' => $this?->hire_date,
            'direct_manager_name' => $this?->directManager?->name,
            'department_name' => $this?->department?->name,
            'job_title' => $this?->job_title,
            'address' => $this?->address,
            'is_active' => $this->is_active,
            'translations' => $this->getTranslations(),
        ];
    }
}
