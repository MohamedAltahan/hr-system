<?php

namespace Modules\System\JobTitle\Models;

use Modules\Common\Models\BaseModel;

class JobTitle extends BaseModel
{
    protected $translatable = ['name'];

    protected $fillable = ['name'];
}
