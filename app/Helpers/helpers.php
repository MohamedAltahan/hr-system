<?php

// Get auth user
if (! function_exists('user')) {
    function user($attribute = null, $guard = null): \Illuminate\Contracts\Auth\Authenticatable|string|null
    {
        if ($attribute) {
            return auth(activeGuard($guard))->user()?->{$attribute};
        }

        return auth(activeGuard($guard))->user();
    }
}

// Active Guard Function
if (! function_exists('activeGuard')) {
    function activeGuard($guard = null): bool|int|string|null
    {
        if ($guard) {
            return auth($guard)->check();
        }

        foreach (array_keys(config('auth.guards')) as $guard) {
            if (auth($guard)->check()) {
                return $guard;
            }
        }

        return null;
    }
}
