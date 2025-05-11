<?php

namespace Modules\System\User\Services;

use Modules\Common\Enums\ImageQuality;
use Modules\Common\Enums\UserRoleEnum;
use Modules\Common\Filters\Common\JsonNameSearch;
use Modules\Common\Traits\UploadFile;
use Modules\System\User\Http\Requests\UserRequest;
use Modules\System\User\Models\User;

class UserService
{
    use UploadFile;

    public function getPaginatedUsers($perPage)
    {
        return User::filter([JsonNameSearch::class])->paginate($perPage);
    }

    public function getUser($id)
    {
        return User::with('branch')->find($id);
    }

    public function create(UserRequest $request)
    {
        $userData = $request->validated();
        $userData['avatar'] = $this->uploadFile('avatar', 'avatar', config('filesystems.default'), ImageQuality::Low->value);
        return User::create($userData);
    }

    public function update(UserRequest $request, User $user)
    {
        $userData = $request->validated();
        $userData['avatar'] = $this->fileUpdate('avatar', 'avatar', config('filesystems.default'), $user->avatar, ImageQuality::Low->value);
        $user->update($userData);
    }

    public function destroy($id)
    {
        $user = User::find($id);

        if ($user->role == UserRoleEnum::SuperAdmin || $user->role == UserRoleEnum::OWNER) {
            return false;
        }

        return $user->delete();
    }
}
