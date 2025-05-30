<?php

namespace Modules\System\Setting\Models;

use Modules\Common\Models\BaseModel;

class Setting extends BaseModel
{
    protected $translatable = ['name'];

    protected $fillable = ['name', 'key', 'value', 'type'];

    protected $casts = [
        'value' => 'array',
    ];
}
