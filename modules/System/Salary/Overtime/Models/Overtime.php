<?php

namespace Modules\System\Salary\Overtime\Models;

use Modules\Common\Models\BaseModel;
use Modules\System\User\Models\User;

class Overtime extends BaseModel
{
    // protected $fillable = [];
    protected $guarded = [];

    // relations
    public function employee()
    {
        return $this->belongsTo(User::class);
    }

    public function reviewedBy()
    {
        return $this->belongsTo(User::class, 'reviewed_by');
    }
}
