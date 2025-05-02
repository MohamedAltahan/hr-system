<?php

namespace Modules\Erp\Branch\Models;

use Modules\Common\Models\BaseModel;
use Modules\Common\Traits\HasLocalizedName;

class Branch extends BaseModel
{
    use HasLocalizedName;

    public $timestamps = false;

    protected $translatable = ['description', 'address'];

    protected $fillable = ['name_ar', 'name_en', 'description', 'address', 'status', 'phone', 'created_at'];

    protected $casts = [
        'name' => 'array',
        'description' => 'array',
        'address' => 'array',
    ];
}
