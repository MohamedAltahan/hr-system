<?php

namespace Modules\System\Profile\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Modules\Common\Enums\ImageQuality;
use Modules\Common\Enums\StatusCodeEnum;
use Modules\Common\Http\Controllers\ApiController;
use Modules\Common\Traits\ApiResponse;
use Modules\Common\Traits\UploadFile;
use Modules\System\Profile\Http\Requests\ProfileRequest;
use Modules\System\Profile\Http\Resources\ProfileResource;
use Modules\System\Profile\Models\Profile;
use Modules\System\Profile\Services\ProfileService;

class ProfileController extends ApiController
{
    use ApiResponse, UploadFile;

    public function show(Request $request)
    {
        $profile = $request->user();

        return $this->sendResponse(
            ProfileResource::make($profile),
            __('Data fetched successfully'),
            StatusCodeEnum::Success->value
        );
    }

    public function updateProfile(ProfileRequest $request)
    {
        $profile = $request->user();

        $data = $request->validated();

        if (!empty($data['avatar'])) {
            $data['avatar'] = $this->fileUpdate('avatar', 'avatar', config('filesystems.default'), $profile->avatar, ImageQuality::Low->value);
        } else {
            unset($data['avatar']);
        }

        if (!empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }

        $profile->update($data);

        return $this->sendResponse(
            [],
            __('Data updated successfully'),
            StatusCodeEnum::Success->value
        );
    }
}
