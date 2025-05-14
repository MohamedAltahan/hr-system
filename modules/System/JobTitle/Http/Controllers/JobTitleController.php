<?php

namespace Modules\System\JobTitle\Http\Controllers;

use Modules\Common\Enums\StatusCodeEnum;
use Modules\Common\Http\Controllers\ApiController;
use Modules\Common\Traits\ApiResponse;
use Modules\System\JobTitle\Http\Requests\JobTitleRequest;
use Modules\System\JobTitle\Http\Resources\JobTitleResource;
use Modules\System\JobTitle\Models\JobTitle;
use Modules\System\JobTitle\Services\JobTitleService;

class JobTitleController extends ApiController
{
    use ApiResponse;

    public static ?string $model = JobTitle::class;

    public function __construct(protected JobTitleService $service)
    {
        parent::__construct();
    }

    public function index()
    {
        $data = $this->service->getPaginatedData($this->perPage);

        return $this->sendResponse(
            JobTitleResource::paginate($data),
            __('Data fetched successfully'),
            StatusCodeEnum::Success->value
        );
    }

    public function store(JobTitleRequest $request)
    {
        $data = $this->service->create($request, new JobTitle);

        return $this->sendResponse(
            JobTitleResource::make($data),
            __('Data created successfully'),
            StatusCodeEnum::Created_successfully->value
        );
    }

    public function show(JobTitle $JobTitle)
    {
        return $this->sendResponse(
            JobTitleResource::make($JobTitle),
            __('Data fetched successfully'),
            StatusCodeEnum::Success->value
        );
    }

    public function update(JobTitleRequest $request, int $id)
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
