<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Cache\CacheManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Symfony\Component\HttpFoundation\Response;

class UpdateLastSeen
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($user = user()) {

            $cacheKey = 'user_last_seen_'.$user->id;

            // Get cache store directly without tags
            $cache = app(CacheManager::class)->store(config('cache.default'));

            if (! $cache->has($cacheKey)) {
                $user->update(['last_seen' => now()]);
                $cache->put($cacheKey, true, now()->addMinutes(15));
            }
        }

        return $next($request);
    }
}
