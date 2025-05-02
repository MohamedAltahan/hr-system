<?php

namespace Modules\Admin\Admin\Services;

use Modules\Common\Enums\ImageQuality;
use Modules\Common\Enums\UserRoleEnum;
use Modules\Common\Filters\Search;
use Modules\Common\Traits\UploadFile;
use Modules\Erp\User\Http\Requests\UserRequest;
use Modules\Erp\User\Models\User;

class AdminService
{
    use UploadFile;

    public function getPaginatedUsers($perPage)
    {
        return User::filter([Search::class])->paginate($perPage);
    }

    public function create(UserRequest $request)
    {
        $userData = $request->validated();
        $userData['avatar'] = $this->uploadFile('avatar', 'avatar', 'public', ImageQuality::Low->value);
        User::create($userData);
    }

    public function update(UserRequest $request, User $user)
    {
        $userData = $request->validated();
        $userData['avatar'] = $this->fileUpdate('avatar', 'avatar', 'public', $user->avatar, ImageQuality::Low->value);
        $user->update($userData);
    }

    public function destroy(User $user)
    {
        if ($user->role == UserRoleEnum::SuperAdmin) {
            return false;
        }

        return $user->delete();
    }
}
