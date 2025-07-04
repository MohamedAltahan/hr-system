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
            'avatar' => $this->avatar ? asset($this->avatar) : '',
            'gender' => $this?->gender,
            'social_status' => $this?->social_status,
            'hire_date' => $this?->hire_date,
            'address' => $this?->address,
            'last_seen' => formatDate($this->last_seen),
            'is_active' => $this->is_active,
            'contract_start_date' => $this->start_date,
            'contract_end_date' => $this->end_date,
            'working_nature' => $this->attendanceRule?->work_type->label(),
            'branch' => [
                'id' => $this->branch->id,
                'name' => $this->branch->name,
            ],
            'direct_manager' => [
                'id' => $this?->directManager?->id,
                'name' => $this?->directManager?->name,
            ],
            'department_name' => [
                'id' => $this?->department?->id,
                'name' => $this?->department?->name,
            ],
            'job_title' => [
                'id' => $this?->jobTitle?->id,
                'name' => $this?->jobTitle?->name,
            ],
            'position' => [
                'id' => $this?->position?->id,
                'name' => $this?->position?->name,
            ],
            'attendance_rule' => [
                'id' => $this->attendanceRule?->id,
                'name' => $this->attendanceRule?->name,
            ],
            'salary' => $this->salary,
            'start_date' => formatDate($this->start_date),
            'end_date' => formatDate($this->end_date),
            'roles' => RoleResource::collection($this->roles),
            'translations' => $this->getTranslations(),
        ];
    }
}
