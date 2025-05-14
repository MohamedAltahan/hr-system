<?php

namespace Modules\Common\Filters\Employee;

use Closure;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Modules\Common\Contracts\FilterContract;

class EmployeeNumberFilter implements FilterContract
{
    public function handle(Builder $query, Closure $next)
    {
        return $next($query)->when(request()->has('employee_number '), function ($query) {
            $query->where('employee_number', request('name'));
        });
    }
}
