<?php

namespace Modules\Website\User\Services;

use Modules\Common\Enums\ImageQuality;
use Modules\Common\Enums\UserRoleEnum;
use Modules\Common\Filters\Common\JsonNameSearch;
use Modules\Common\Traits\UploadFile;
use Modules\Website\User\Http\Requests\UserRequest;
use Modules\Website\User\Models\User;

class UserService
{
    use UploadFile;

    public function getPaginatedUsers($perPage)
    {
        return User::filter([JsonNameSearch::class])->paginate($perPage);
    }

    public function create(UserRequest $request)
    {
        $userData = $request->validated();
        $userData['name'] = $request->username;

        return User::create($userData);
    }

    public function update(UserRequest $request, int $id)
    {
        $user = User::find($id);
        $userData = $request->validated();
        $userData['avatar'] = $this->fileUpdate('avatar', 'avatar', 'public', $user->avatar, ImageQuality::Low->value);

        return $user->update($userData);
    }

    public function getUser($id)
    {
        return User::find($id);
    }

    public function destroy(User $user)
    {
        if ($user->role == UserRoleEnum::SuperAdmin) {
            return false;
        }

        return $user->delete();
    }
}
