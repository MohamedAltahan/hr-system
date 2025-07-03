<?php

namespace Modules\System\Employee\JobTitle\Models;

use Modules\Common\Models\BaseModel;

class JobTitle extends BaseModel
{
    protected $translatable = ['name'];

    protected $fillable = ['name'];
}
