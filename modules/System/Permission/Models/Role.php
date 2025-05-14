<?php

namespace Modules\System\Permission\Models;

use Barryvdh\LaravelIdeHelper\Eloquent;
use Modules\Common\Traits\Filterable;
use Spatie\Permission\Models\Role as SpatieRole;
use Spatie\Translatable\HasTranslations;

/**
 * App\Models\Role.
 *
 * @mixin Eloquent
 */
class Role extends SpatieRole
{
    use Filterable;
    use HasTranslations;

    public $translatable = ['title'];
}
