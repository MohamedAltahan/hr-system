<?php

namespace Modules\Erp\Sidebar\Models;

use Modules\Common\Models\BaseModel;

class Sidebar extends BaseModel
{
    public $translatable = ['name'];

    protected $guarded = [];
    // protected $fillable = [];

    public function children()
    {
        return $this->hasMany(Sidebar::class, 'parent_id');
    }

    protected $casts = [
        'permissions' => 'array',
    ];
}
