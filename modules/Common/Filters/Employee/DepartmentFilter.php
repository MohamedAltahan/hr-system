<?php

namespace Modules\Common\Filters\Employee;

use Closure;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Modules\Common\Contracts\FilterContract;

class DepartmentFilter implements FilterContract
{
    public function handle(Builder $query, Closure $next)
    {
        return $next($query)->when(request()->has('department_id'), function ($query) {
            $query->where('department_id', request('department_id'));
        });
    }
}
