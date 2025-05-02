<?php

namespace Modules\Admin\Admin\Http\Controllers;

use Modules\Common\Enums\StatusCodeEnum;
use Modules\Common\Http\Controllers\ApiController;
use Modules\Common\Traits\ApiResponse;
use Modules\Erp\User\Http\Requests\UserRequest;
use Modules\Erp\User\Http\Resources\UserResource;
use Modules\Erp\User\Models\User;
use Modules\Erp\User\Services\UserService;

class AdminController extends ApiController
{
    use ApiResponse;

    protected $userService;

    public function __construct(UserService $userService)
    {
        parent::__construct();
        $this->userService = $userService;
    }

    public function index()
    {
        $users = $this->userService->getPaginatedUsers($this->perPage);

        return $this->sendResponse(
            UserResource::paginate($users),
            __('Data fetched successfully'),
            StatusCodeEnum::Success->value
        );
    }

    public function store(UserRequest $request)
    {
        $this->userService->create($request);

        return $this->sendResponse(
            [],
            __('Data created successfully'),
            StatusCodeEnum::Created_successfully->value
        );
    }

    public function show(User $user)
    {
        return $this->sendResponse(
            UserResource::make($user),
            __('Data fetched successfully'),
            StatusCodeEnum::Success->value
        );
    }

    public function update(UserRequest $request, User $user)
    {
        $this->userService->update($request, $user);

        return $this->sendResponse(
            [],
            __('Data updated successfully'),
            StatusCodeEnum::Success->value
        );
    }

    public function destroy(User $user)
    {
        $deleted = $this->userService->destroy($user);

        if (! $deleted) {
            return $this->sendResponse(
                [],
                __('Super admin can not be deleted'),
                StatusCodeEnum::Success->value
            );
        }

        return $this->sendResponse(
            [],
            __('Data deleted successfully'),
            StatusCodeEnum::Success->value
        );
    }
}
