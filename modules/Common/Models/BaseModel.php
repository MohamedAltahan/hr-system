<?php

namespace Modules\Common\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Common\Traits\Filterable;
use Modules\Common\Traits\TranslateAttributes;
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
    use TranslateAttributes;
    protected static function booted()
    {
        static::creating(function ($model) {
            if (
                empty($model->branch_id) &&
                $model->getConnection()->getSchemaBuilder()->hasColumn($model->getTable(), 'branch_id')
            ) {
                $model->branch_id = currentBranchId();
            }
        });
    }
}
