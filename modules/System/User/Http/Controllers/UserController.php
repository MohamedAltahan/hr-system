<?php

namespace Modules\System\User\Http\Controllers;

use Modules\Common\Enums\StatusCodeEnum;
use Modules\Common\Http\Controllers\ApiController;
use Modules\Common\Traits\ApiResponse;
use Modules\System\User\Http\Requests\UserRequest;
use Modules\System\User\Http\Resources\UserResource;
use Modules\System\User\Models\User;
use Modules\System\User\Services\UserService;

class UserController extends ApiController
{
    use ApiResponse;

    public static ?string $model = User::class;

    public function __construct(protected UserService $userService)
    {
        parent::__construct();
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
        $data = $this->userService->create($request);

        return $this->sendResponse(
            [],
            __('Data created successfully'),
            StatusCodeEnum::Created_successfully->value
        );
    }

    public function show($id)
    {
        $user = $this->userService->getUser($id);

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

    public function destroy(int $id)
    {
        $deleted = $this->userService->destroy($id);

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
