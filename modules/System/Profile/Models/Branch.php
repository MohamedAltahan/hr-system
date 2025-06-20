<?php

namespace Modules\System\Branch\Models;

use Modules\Common\Models\BaseModel;

class Branch extends BaseModel
{
    public $timestamps = false;

    protected $translatable = ['name', 'description', 'address'];

    protected $fillable = ['name', 'description', 'address', 'is_active', 'phone', 'created_at'];
}
