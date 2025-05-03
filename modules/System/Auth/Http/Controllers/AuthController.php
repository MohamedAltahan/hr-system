<?php

namespace Modules\System\Auth\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Common\Enums\StatusCodeEnum;
use Modules\Common\Http\Controllers\ApiController;
use Modules\Common\Traits\ApiResponse;
use Modules\System\Auth\Http\Requests\LoginRequest;
use Modules\System\Auth\Services\AuthService;
use Modules\System\User\Http\Resources\UserResource;

class AuthController extends ApiController
{
    use ApiResponse;

    public function login(LoginRequest $request, AuthService $authService)
    {
        $user = $authService->login($request);

        if (! $user) {
            return $this->sendResponse(
                [],
                __('Invalid username or password'),
                StatusCodeEnum::Unauthorized->value
            );
        }

        return $this->sendResponse(
            [
                'user' => UserResource::make($user),
                'token' => $user->createToken('auth_token')->plainTextToken,
            ],
            __('Loged in successfully'),
            StatusCodeEnum::Success->value
        );
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return $this->sendResponse([], __('Loged out successfully'), StatusCodeEnum::Success->value);
    }
}
