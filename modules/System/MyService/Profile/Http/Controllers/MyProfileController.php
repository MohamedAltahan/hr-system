<?php

namespace Modules\System\MyService\Profile\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Modules\Common\Enums\ImageQuality;
use Modules\Common\Enums\StatusCodeEnum;
use Modules\Common\Http\Controllers\ApiController;
use Modules\Common\Traits\ApiResponse;
use Modules\Common\Traits\UploadFile;
use Modules\System\Profile\Http\Requests\ProfileRequest;
use Modules\System\Profile\Http\Resources\ProfileResource;
use Modules\System\User\Http\Resources\UserResource;
use Modules\System\User\Models\User;

class MyFinancialController extends ApiController
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
