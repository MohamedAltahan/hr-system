<?php

namespace Modules\System\Attendance\AttendanceDeparture\Models;

use Modules\Common\Models\BaseModel;
use Modules\System\Branch\Models\Branch;
use Modules\System\User\Models\User;

class AttendanceDeparture extends BaseModel
{
    protected $translatable = ['name'];

    // protected $fillable = [];
    protected $guarded = [];

    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id');
    }

    public function employee()
    {
        return $this->belongsTo(User::class, 'employee_id');
    }
}
