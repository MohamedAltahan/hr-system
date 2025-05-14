<?php

namespace Modules\Common\Filters\Employee;

use Closure;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Modules\Common\Contracts\FilterContract;

class EmployeePositionFilter implements FilterContract
{
    public function handle(Builder $query, Closure $next)
    {
        return $next($query)->when(request()->has('position_id'), function ($query) {
            $query->where('position_id', request('position_id'));
        });
    }
}
