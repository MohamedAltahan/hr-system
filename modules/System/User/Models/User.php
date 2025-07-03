<?php

namespace Modules\System\User\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Modules\Common\Traits\Filterable;
use Modules\System\Branch\Models\Branch;
use Modules\System\Department\Models\Department;
use Modules\System\Employee\EmployeeAsset\Models\EmployeeAsset;
use Modules\System\Employee\EmployeeContract\Models\EmployeeContract;
use Modules\System\Employee\JobTitle\Models\JobTitle;
use Modules\System\Employee\Position\Models\Position;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Translatable\HasTranslations;

// use Modules\System\User\Database\Factories\UserFactory;

class User extends Authenticatable
{
    use Filterable;
    use HasApiTokens, HasRoles, Notifiable;
    use HasFactory;
    use HasTranslations;
    use SoftDeletes;

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
        'hire_date',
        'gender',
        'social_status',
        'national_id',
        'employee_number',
        'job_title_id',
        'direct_manager_id',
        'department_id',
        'position_id',
        'is_owner',
        'is_super_admin',
        'birthday',
        'last_seen',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // relations
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
        return $this->belongsTo(Department::class, 'department_id');
    }

    public function jobTitle()
    {
        return $this->belongsTo(JobTitle::class, 'job_title_id');
    }

    public function position()
    {
        return $this->belongsTo(Position::class, 'position_id');
    }

    public function asset()
    {
        return $this->hasOne(EmployeeAsset::class, 'employee_id');
    }

    public function contract()
    {
        return $this->hasOne(EmployeeContract::class, 'employee_id');
    }

    // scopes
    public function scopeExcludeOwnerAndSuperAdmin($query)
    {
        return $query->where('is_owner', '!=', 1)->where('is_super_admin', '!=', 1);
    }
}
