<?php

namespace Modules\Common\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pipeline\Pipeline;
use Modules\Common\Contracts\FilterContract;

trait Filterable
{
    /**
     * Apply the given filters to the query.
     *
     * @param  array<FilterContract>  $filters
     */
    public function scopeFilter(Builder $query, $filters): Builder
    {
        if (empty($filters)) {
            return $query;
        }

        // Apply filters using Laravel's pipeline
        return app(Pipeline::class) // 1. Get an instance of Laravel's Pipeline
            ->send($query)          // 2. Pass the Eloquent query to the pipeline
            ->through($filters)     // 3. Apply each filter in the $filters array sequentially
            ->thenReturn();         // 4. Return the modified query
    }
}
