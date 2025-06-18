<?php

namespace Modules\System\OpeningPosition\Http\Controllers;

use Modules\Common\Enums\StatusCodeEnum;
use Modules\Common\Http\Controllers\ApiController;
use Modules\Common\Traits\ApiResponse;
use Modules\System\OpeningPosition\Http\Requests\OpeningPositionRequest;
use Modules\System\OpeningPosition\Http\Resources\OpeningPositionResource;
use Modules\System\OpeningPosition\Models\OpeningPosition;
use Modules\System\OpeningPosition\Services\OpeningPositionService;

class OpeningPositionController extends ApiController
{
    use ApiResponse;

    public static ?string $model = OpeningPosition::class;

    public function __construct(protected OpeningPositionService $service)
    {
        parent::__construct();
    }

    public function index()
    {
        $data = $this->service->getPaginatedData($this->perPage);

        return $this->sendResponse(
            OpeningPositionResource::paginate($data),
            __('Data fetched successfully'),
            StatusCodeEnum::Success->value
        );
    }

    public function store(OpeningPositionRequest $request)
    {
        $data = $this->service->create($request, new OpeningPosition);

        return $this->sendResponse(
            OpeningPositionResource::make($data),
            __('Data created successfully'),
            StatusCodeEnum::Created_successfully->value
        );
    }

    public function show(OpeningPosition $OpeningPosition)
    {
        return $this->sendResponse(
            OpeningPositionResource::make($OpeningPosition),
            __('Data fetched successfully'),
            StatusCodeEnum::Success->value
        );
    }

    public function update(OpeningPositionRequest $request, int $id)
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
