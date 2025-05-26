<?php

namespace Modules\System\User\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Common\Traits\HasPagination;
use Modules\System\Permission\Http\Resources\RoleResource;

class UserResource extends JsonResource
{
    use HasPagination;

    public function toArray(Request $request): array
    {
        $userPermissions = $this->permissions->pluck('name');
        return [
            'company_id' => tenant()->id,
            'id' => $this->id,
            'name' => $this->name,
            'username' => $this->username,
            'email' => $this?->email,
            'phone' => $this?->phone,
            'birthday' => $this?->birthday,
            'national_id' => $this?->national_id,
            'employee_number' => $this?->employee_number,
            'avatar' => $this->avatar ? asset('storage/' . $this->avatar) : '',
            'gender' => $this?->gender,
            'social_status' => $this?->social_status,
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
            'roles' => RoleResource::collection($this->roles),
            'translations' => $this->getTranslations(),
        ];
    }
}
