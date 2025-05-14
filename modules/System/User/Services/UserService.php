<?php

namespace Modules\System\User\Services;

use Modules\Common\Enums\ImageQuality;
use Modules\Common\Filters\Common\BranchFilter;
use Modules\Common\Filters\Common\JsonNameSearch;
use Modules\Common\Filters\Employee\DepartmentFilter;
use Modules\Common\Filters\Employee\EmployeeNumberFilter;
use Modules\Common\Filters\Employee\EmployeePositionFilter;
use Modules\Common\Traits\UploadFile;
use Modules\System\User\Http\Requests\UserRequest;
use Modules\System\User\Models\User;

class UserService
{
    use UploadFile;

    public function getPaginatedUsers($perPage)
    {
        return User::excludeOwnerAndSuperAdmin()->filter([
            JsonNameSearch::class,
            EmployeeNumberFilter::class,
            EmployeePositionFilter::class,
            DepartmentFilter::class,
            BranchFilter::class,
        ])->paginate($perPage);
    }

    public function getUser($id)
    {
        return User::with('branch')->find($id);
    }

    public function create(UserRequest $request)
    {
        $userData = $request->validated();
        $userData['avatar'] = $this->uploadFile('avatar', 'avatar', config('filesystems.default'), ImageQuality::Low->value);
        $user = User::create($userData);

        $user->update([
            'employee_number' => $user->id,
        ]);

        return $user;
    }

    public function update(UserRequest $request, User $user)
    {
        $userData = $request->validated();
        $userData['avatar'] = $this->fileUpdate('avatar', 'avatar', config('filesystems.default'), $user->avatar, ImageQuality::Low->value);
        $userData['employee_number'] = $user->id;
        $user->update($userData);
    }

    public function destroy($id)
    {
        $user = User::excludeOwnerAndSuperAdmin()->find($id);

        if (! $user) {
            return false;
        }

        return $user->delete();
    }
}
