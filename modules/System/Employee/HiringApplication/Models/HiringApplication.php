<?php

namespace Modules\System\Employee\HiringApplication\Models;

use Modules\Common\Models\BaseModel;
use Modules\System\Employee\OpeningPosition\Models\OpeningPosition;

class HiringApplication extends BaseModel
{
    protected $fillable = [
        'opening_position_id',
        'name',
        'email',
        'phone',
        'current_salary',
        'expected_salary',
        'hire_date',
        'contract',
        'evaluations',
        'status',
        'religion',
        'nationality',
        'birthdate',
        'notes',
        'cv',
    ];

    // relations
    public function openingPosition()
    {
        return $this->belongsTo(OpeningPosition::class);
    }
}
