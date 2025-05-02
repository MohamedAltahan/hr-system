<?php

namespace Modules\Website\User\Http\Controllers;

use Modules\Admin\Tenant\Models\Tenant;
use Modules\Common\Enums\StatusCodeEnum;
use Modules\Common\Http\Controllers\ApiController;
use Modules\Common\Traits\ApiResponse;
use Modules\Website\User\Http\Requests\UserRequest;
use Modules\Website\User\Http\Resources\UserResource;
use Modules\Website\User\Models\User;
use Modules\Website\User\Services\UserService;

class UserController extends ApiController
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
        $user = $this->userService->create($request);

        $tenant = Tenant::create([
            'tenancy_db_name' => 'erp-'.$request->domain,
            'user_id' => $user->id,
            'company_name' => $request->company_name,
            'domain' => $request->domain,
            'is_active' => 1,
            'version' => 1,
            'creating_status' => 1,
            'plan_id' => $request->plan_id,
        ]);

        $tenant->domains()->create([
            'domain' => $request->domain,
        ]);

        return $this->sendResponse(
            UserResource::make($user),
            __('Data created successfully'),
            StatusCodeEnum::Created_successfully->value
        );
    }

    public function show(int $id)
    {
        $user = $this->userService->getUser($id);

        return $this->sendResponse(
            UserResource::make($user),
            __('Data fetched successfully'),
            StatusCodeEnum::Success->value
        );
    }

    public function update(UserRequest $request, int $id)
    {
        $user = $this->userService->update($request, $id);

        return $this->sendResponse(
            UserResource::make($user),
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
