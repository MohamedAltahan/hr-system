<?php

namespace Modules\Common\Filters\Common;

use Closure;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Modules\Common\Contracts\FilterContract;

class JsonNameSearch implements FilterContract
{
    public function handle(Builder $query, Closure $next)
    {
        return $next($query)->when(request()->filled('name'), function ($query) {
            $search = '%'.strtolower(request('name')).'%';

            $query->whereRaw('LOWER(JSON_UNQUOTE(JSON_EXTRACT(name, "$.ar"))) LIKE ?', [$search])
                ->orWhereRaw('LOWER(JSON_UNQUOTE(JSON_EXTRACT(name, "$.en"))) LIKE ?', [$search]);
        });
    }
}
