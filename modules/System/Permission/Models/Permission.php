<?php

namespace Modules\Erp\Permission\Models;

use Modules\Common\Traits\HasTranslations;
use Spatie\Permission\Models\Permission as SpatiePermission;

class Permission extends SpatiePermission
{
    use HasTranslations;

    public $translatable = ['title'];

    public function hasUsersViaRole()
    {
        return $this->belongsToMany(Role::class, config(
            'permission.table_names.role_has_permissions',
            'role_has_permissions'
        ), 'permission_slug', 'role_id');
    }

    public function hasDirectUsers()
    {
        return (bool) $this->roles()->has('users')->count();
    }

    public function scopeExcludeSlugs($query, $slugs)
    {
        return $query->whereNotIn('slug', $slugs);
    }

    public function scopeForGroupKeys($query, $groupKeys)
    {
        return $query->where(function ($query) use ($groupKeys) {
            foreach ($groupKeys as $key) {
                $query->orWhere('group', 'like', "%$key%");
            }
        });
    }
}
