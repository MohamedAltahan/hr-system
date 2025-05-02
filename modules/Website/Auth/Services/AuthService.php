<?php

namespace Modules\Website\Auth\Services;

use Illuminate\Support\Facades\Auth;
use Modules\Common\Enums\GuardEnum;
use Modules\Website\Auth\Http\Requests\LoginRequest;

class AuthService
{
    public static function login(LoginRequest $request)
    {
        $guard = Auth::guard(GuardEnum::WEBSITESESSION->value);

        if ($guard->attempt([
            'username' => $request->username,
            'password' => $request->password,
        ])) {
            $user = $guard->user();

            return $user;
        } else {
            return false;
        }
    }
}
