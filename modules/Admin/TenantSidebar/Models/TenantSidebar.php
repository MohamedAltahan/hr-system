<?php

namespace Modules\Admin\TenantSidebar\Models;

use Modules\Common\Models\BaseModel;

class TenantSidebar extends BaseModel
{
    public $translatable = ['name'];

    // protected $fillable = [];
    protected $guarded = [];

    public function children()
    {
        return $this->hasMany(TenantSidebar::class, 'parent_id');
    }
}
