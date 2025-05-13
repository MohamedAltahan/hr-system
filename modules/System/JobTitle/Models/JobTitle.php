<?php

namespace Modules\System\JobTitle\Models;

use Modules\Common\Enums\UserRoleEnum;
use Modules\Common\Models\BaseModel;
use Modules\Common\Traits\HasLocalizedName;
use Modules\System\User\Models\User;

class JobTitle extends BaseModel
{
    protected $translatable = ['name'];

    protected $fillable = ['name'];
}
