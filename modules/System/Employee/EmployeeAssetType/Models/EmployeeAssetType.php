<?php

namespace Modules\System\Employee\EmployeeAssetType\Models;

use Modules\Common\Models\BaseModel;
use Modules\System\Branch\Models\Branch;

class EmployeeAssetType extends BaseModel
{
    public $timestamps = false;

    protected $translatable = ['name', 'description'];

    protected $fillable = ['name', 'description', 'branch_id'];

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }
}
