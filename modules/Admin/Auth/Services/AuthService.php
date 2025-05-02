<?php

namespace Modules\Admin\Auth\Services;

use Illuminate\Support\Facades\Auth;
use Modules\Admin\Auth\Http\Requests\LoginRequest;
use Modules\Common\Enums\GuardEnum;

class AuthService
{
    public static function login(LoginRequest $request)
    {
        $guard = Auth::guard(GuardEnum::ADMINSESSION->value);

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
