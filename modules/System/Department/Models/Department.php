<?php

namespace Modules\System\Department\Models;

use Modules\Common\Enums\UserRoleEnum;
use Modules\Common\Models\BaseModel;
use Modules\System\User\Models\User;

class Department extends BaseModel
{
    public $timestamps = false;

    protected $translatable = ['name', 'description'];

    protected $fillable = ['name', 'description'];


    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function manager()
    {
        return $this->hasOne(User::class, 'department_id')->where('role', UserRoleEnum::MANAGER);
    }
}
