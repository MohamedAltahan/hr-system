<?php

namespace Modules\System\Employee\Position\Models;

use Modules\Common\Models\BaseModel;

class Position extends BaseModel
{
    protected $translatable = ['name'];

    protected $fillable = ['name'];
}
