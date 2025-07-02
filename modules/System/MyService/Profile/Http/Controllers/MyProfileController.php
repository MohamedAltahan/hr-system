<?php

namespace Modules\System\MyService\Profile\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Common\Enums\StatusCodeEnum;
use Modules\Common\Http\Controllers\ApiController;
use Modules\Common\Traits\ApiResponse;
use Modules\Common\Traits\UploadFile;
use Modules\System\User\Http\Resources\UserResource;

class MyProfileController extends ApiController
{
    use ApiResponse, UploadFile;

    public function show(Request $request)
    {
        $profile = $request->user();

        return $this->sendResponse(
            UserResource::make($profile),
            __('Data fetched successfully'),
            StatusCodeEnum::Success->value
        );
    }
}
