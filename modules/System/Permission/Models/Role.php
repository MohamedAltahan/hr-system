<?php

namespace Modules\Erp\Permission\Models;

use Barryvdh\LaravelIdeHelper\Eloquent;
use Modules\Common\Traits\Filterable;
use Modules\Common\Traits\HasTranslations;
use Spatie\Permission\Models\Role as SpatieRole;

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
