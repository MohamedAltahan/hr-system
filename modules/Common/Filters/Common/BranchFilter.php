<?php

namespace Modules\Common\Filters\Common;

use Closure;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Modules\Common\Contracts\FilterContract;

class BranchFilter implements FilterContract
{
    public function handle(Builder $query, Closure $next)
    {
        return $next($query)->when(request()->has('branch_id'), function ($query) {
            $query->where('branch_id', request('branch_id'));
        });
    }
}
