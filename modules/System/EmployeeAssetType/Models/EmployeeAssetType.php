<?php

namespace Modules\System\EmployeeAssetType\Models;

use Modules\Common\Enums\UserRoleEnum;
use Modules\Common\Models\BaseModel;
use Modules\System\Branch\Models\Branch;
use Modules\System\User\Models\User;

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
