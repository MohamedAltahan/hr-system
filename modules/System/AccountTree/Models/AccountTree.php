<?php

namespace Modules\Erp\AccountTree\Models;

use Kalnoy\Nestedset\NodeTrait;
use Modules\Common\Models\BaseModel;

class AccountTree extends BaseModel
{
    use NodeTrait;

    public $translatable = ['description'];

    protected $fillable = [
        'account_code',
        'account_nature',
        'account_category',
        'allow_delete',
        'is_active',
        'name_ar',
        'name_en',
        'parent_id',
        'description',
    ];

    protected $casts = [
        'name' => 'array',
        'description' => 'array',
    ];

    // accessors
    public function getAccountNatureAttribute($value)
    {
        return __($value);
    }
}
