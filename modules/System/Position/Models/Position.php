<?php

namespace Modules\System\Position\Models;

use Modules\Common\Enums\UserRoleEnum;
use Modules\Common\Models\BaseModel;
use Modules\Common\Traits\HasLocalizedName;
use Modules\System\User\Models\User;

class Position extends BaseModel
{
    public $timestamps = false;

    protected $translatable = ['name', 'description',];

    protected $fillable = ['name', 'description',];

    protected $casts = [
        'name' => 'array',
        'description' => 'array',
        'address' => 'array',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function manager()
    {
        return $this->hasOne(User::class, 'department_id')->where('role', UserRoleEnum::MANAGER);
    }
}
