<?php

// Get auth user

use Illuminate\Support\Carbon;

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

if (! function_exists('formatDate')) {
    function formatDate($date)
    {
        $formats = [
            'date' => 'Y-m-d',           // '2025-01-01'
            'datetime' => 'Y-m-d h:i A',     // 2025-01-01 11:00:00 AM
            // 'time_12hr' => 'h:i A',           // 12:00 AM
            // 'datetime_24hr' => 'Y-m-d H:i:s',     // 2025-01-01 23:00:00
            // 'time_24hr' => 'H:i',             // 24:00
            // 'long' => 'F Y j',           // 1 Jan 2025
        ];

        if (empty($date)) {
            return '';
        }

        $carbon = is_numeric($date)
            ? Carbon::createFromTimestamp($date)
            : Carbon::parse($date);

        $result = [];

        foreach ($formats as $key => $format) {
            $formatted = $carbon->translatedFormat($format);
            $result[$key] = $formatted;
        }

        return $result;
    }


    function formatTime($time)
    {
        $formats = [
            'time_12hr' => 'h:i A',     // 12-hour format with AM/PM (e.g., 01:30 PM)
            'time_24hr' => 'H:i',       // 24-hour format (e.g., 13:30)
        ];

        if (empty($time)) {
            return '';
        }

        $carbon = is_numeric($time)
            ? Carbon::createFromTimestamp($time)
            : Carbon::parse($time);

        $result = [];

        foreach ($formats as $key => $format) {
            $formatted = $carbon->translatedFormat($format);
            $result[$key] = $formatted;
        }

        return $result;
    }


    function currentBranchId()
    {
        return auth('tenant-users')->user()->branch_id;
    }
}
