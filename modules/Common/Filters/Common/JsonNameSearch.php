<?php

namespace Modules\Common\Filters\Common;

use Closure;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Modules\Common\Contracts\FilterContract;

class JsonNameSearch implements FilterContract
{
    // handle method auto recognized by laravel pipleline
    public function handle(Builder $query, Closure $next)
    {
        return $next($query)->when(request()->has('name'), function ($query) {
            $query->whereRaw('LOWER(name->"$.ar") LIKE ?', ['%'.strtolower(request('name')).'%'])
                ->orWhereRaw('LOWER(name->"$.en") LIKE ?', ['%'.strtolower(request('name')).'%']);
        });
    }
}
