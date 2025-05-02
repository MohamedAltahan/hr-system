<?php

namespace Modules\Admin\TenantSidebar\Filters;

use Closure;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Modules\Common\Contracts\FilterContract;

class Search implements FilterContract
{
    // handle method auto recognized by laravel pipleline
    public function handle(Builder $query, Closure $next)
    {
        return $next($query)->when(request()->has('search'), function ($query) {
            $query->where(function ($query) {
                // search in parent
                $query->whereRaw('LOWER(name->"$.ar") LIKE ?', ['%'.strtolower(request('search')).'%'])
                    ->orWhereRaw('LOWER(name->"$.en") LIKE ?', ['%'.strtolower(request('search')).'%']);
            })
                // and parent who has children
                ->orWhereHas('children', function ($query) {
                    $query->whereRaw('LOWER(name->"$.ar") LIKE ?', ['%'.strtolower(request('search')).'%'])
                        ->orWhereRaw('LOWER(name->"$.en") LIKE ?', ['%'.strtolower(request('search')).'%']);
                });
        });
    }
}
