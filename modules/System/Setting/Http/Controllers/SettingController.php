<?php

namespace Modules\System\Setting\Http\Controllers;

use Modules\Common\Enums\StatusCodeEnum;
use Modules\Common\Http\Controllers\ApiController;
use Modules\Common\Traits\ApiResponse;
use Modules\System\Setting\Http\Requests\SettingRequest;
use Modules\System\Setting\Http\Resources\SettingResource;
use Modules\System\Setting\Models\Setting;
use Modules\System\Setting\Services\SettingService;

class SettingController extends ApiController
{
    use ApiResponse;

    public static ?string $model = Setting::class;

    public function __construct(protected SettingService $service)
    {
        parent::__construct();
    }

    public function index()
    {
        $data = $this->service->getPaginatedData($this->perPage);

        return $this->sendResponse(
            SettingResource::paginate($data),
            __('Data fetched successfully'),
            StatusCodeEnum::Success->value
        );
    }

    public function store(SettingRequest $request)
    {
        $data = $this->service->create($request, new Setting);

        return $this->sendResponse(
            SettingResource::make($data),
            __('Data created successfully'),
            StatusCodeEnum::Created_successfully->value
        );
    }

    public function show(Setting $department)
    {
        return $this->sendResponse(
            SettingResource::make($department),
            __('Data fetched successfully'),
            StatusCodeEnum::Success->value
        );
    }

    public function update(SettingRequest $request, int $id)
    {
        $this->service->update($request, $id);

        return $this->sendResponse(
            [],
            __('Data updated successfully'),
            StatusCodeEnum::Success->value
        );
    }

    public function destroy(int $id)
    {
        $deleteStatus = $this->service->destroy($id);

        if (! $deleteStatus) {
            return $this->sendResponse(
                [],
                __('Data not deleted because it is in use'),
                StatusCodeEnum::CONFlICT->value
            );
        }

        return $this->sendResponse(
            [],
            __('Data deleted successfully'),
            StatusCodeEnum::Success->value
        );
    }
}
