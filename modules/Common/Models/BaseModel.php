<?php

namespace Modules\Common\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Common\Traits\Filterable;
use Spatie\Translatable\HasTranslations;

/**
 * @mixin Builder
 * @mixin Eloquent
 */
class BaseModel extends Model
{
    use Filterable;
    use HasFactory;
    use HasTranslations;
}
