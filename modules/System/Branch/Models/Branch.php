<?php

namespace Modules\System\Branch\Models;

use Modules\Common\Models\BaseModel;
use Modules\Common\Traits\HasLocalizedName;

class Branch extends BaseModel
{
    public $timestamps = false;

    protected $translatable = ['name', 'description', 'address'];

    protected $fillable = ['name', 'description', 'address', 'status', 'phone', 'created_at'];
}
