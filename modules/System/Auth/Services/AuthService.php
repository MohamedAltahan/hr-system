<?php

namespace Modules\System\Auth\Services;

use Illuminate\Support\Facades\Auth;
use Modules\Common\Enums\GuardEnum;
use Modules\System\Auth\Http\Requests\LoginRequest;
use Modules\System\User\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthService
{
    public static function login(LoginRequest $request)
    {
        $user = User::where('username', $request->username)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return false;
        }

        return $user;
    }
}
