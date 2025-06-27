<?php

namespace Modules\System\Attendance\DisciplinaryActions\Models;

use Modules\Common\Models\BaseModel;
use Modules\System\Attendance\DisciplinaryActions\Enum\DisciplinaryActionsEnum;
use Modules\System\Branch\Models\Branch;
use Modules\System\User\Models\User;

class DisciplinaryActions extends BaseModel
{
    protected $translatable = ['name'];

    // protected $fillable = [];
    protected $guarded = [];

    protected $casts = [
        'action_type' => DisciplinaryActionsEnum::class,
    ];

    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id');
    }

    public function employee()
    {
        return $this->belongsTo(User::class, 'employee_id');
    }
}
