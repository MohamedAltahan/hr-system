<?php

namespace Modules\System\EmployeeEvaluation\Models;

use Modules\Common\Models\BaseModel;
use Modules\Common\Traits\HasLocalizedName;
use Modules\System\User\Models\User;

class EmployeeEvaluation extends BaseModel
{
    protected  $guarded = [];

    protected $translatable = ['name'];

    public function employee()
    {
        return $this->belongsTo(User::class);
    }

    public function evaluator()
    {
        return $this->belongsTo(User::class);
    }
}
