<?php

namespace Modules\System\Setting\Models;

use Modules\Common\Enums\UserRoleEnum;
use Modules\Common\Models\BaseModel;
use Modules\System\User\Models\User;

class Setting extends BaseModel
{
    protected $translatable = ['name'];

    protected $fillable = ['name', 'key', 'value', 'type'];

    protected $casts = [
        'value' => 'array',
    ];
}
