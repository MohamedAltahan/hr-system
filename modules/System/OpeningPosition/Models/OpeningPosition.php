<?php

namespace Modules\System\OpeningPosition\Models;

use Modules\Common\Models\BaseModel;
use Modules\System\Department\Models\Department;
use Modules\System\HiringApplication\Models\HiringApplication;
use Modules\System\Position\Models\Position;

class OpeningPosition extends BaseModel
{
    protected $fillable = [
        'position_id',
        'department_id',
        'email',
        'number_of_vacancies',
        'type',
        'website',
        'description',
        'requirements',
        'is_published'
    ];

    //relations
    public function position()
    {
        return $this->belongsTo(Position::class);
    }

    public function hiringApplications()
    {
        return $this->hasMany(HiringApplication::class);
    }

    public function newHiringApplications()
    {
        return $this->hasMany(HiringApplication::class)->where('status', 'pending');
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
