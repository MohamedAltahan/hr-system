<?php

namespace Modules\Common\Filters\Common;

use Closure;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Modules\Common\Contracts\FilterContract;

class NameSearch implements FilterContract
{
    // handle method auto recognized by laravel pipleline
    public function handle(Builder $query, Closure $next)
    {
        return $next($query)->when(request()->has('name'), function ($query) {
            // IN BOOLEAN MODE → Allows advanced search operators (+, -, *, "").
            // fallback to search using like
            $query->whereRaw('MATCH(name_ar, name_en) AGAINST (? IN BOOLEAN MODE)', request('name').'*')
                ->orWhere('name_ar', 'LIKE', '%'.request('name').'%')
                ->orWhere('name_en', 'LIKE', '%'.request('name').'%');
        });
    }
}
