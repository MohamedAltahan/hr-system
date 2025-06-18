<?php

namespace Modules\System\OpeningPosition\Models;

use Modules\Common\Models\BaseModel;

class OpeningPosition extends BaseModel
{
    protected $translatable = ['name'];

    protected $fillable = ['name'];
}
