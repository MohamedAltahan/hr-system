<?php

namespace Modules\System\User\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Modules\Common\Enums\UserRoleEnum;
use Modules\Common\Traits\Filterable;
use Modules\Common\Traits\HasLocalizedName;
use Modules\System\Branch\Models\Branch;
use Modules\System\Department\Models\Department;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Translatable\HasTranslations;

// use Modules\System\User\Database\Factories\UserFactory;

class User extends Authenticatable
{
    use Filterable;
    use HasApiTokens, HasRoles, Notifiable;
    use HasFactory;
    use HasTranslations;

    protected $translatable = ['name', 'description', 'address'];


    protected $fillable = [
        'name',
        'username',
        'branch_id',
        'phone',
        'email',
        'avatar',
        'password',
        'address',
        'role',
        'is_active',
        'birth_date',
        'hire_date',
        'gender',
        'social_status',
        'national_id',
        'employee_number',
        'job_title',
        'direct_manager_id',
        'department_id',
    ];

    protected $casts = [
        'name' => 'array',
        'role' => UserRoleEnum::class,
        'address' => 'array',
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function directManager()
    {
        return $this->belongsTo(User::class, 'direct_manager_id');
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
