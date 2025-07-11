<?php

namespace Modules\System\Salary\Payslip\Models;

use Modules\Common\Models\BaseModel;
use Modules\System\User\Models\User;

class Payslip extends BaseModel
{
    // protected $fillable = [];
    protected $guarded = [];

    // relations
    public function employee()
    {
        return $this->belongsTo(User::class);
    }
}
