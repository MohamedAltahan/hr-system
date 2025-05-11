<?php

namespace Modules\System\Position\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Modules\Common\Enums\StatusCodeEnum;
use Modules\Common\Enums\UserRoleEnum;
use Modules\Common\Http\Controllers\ApiController;
use Modules\Common\Traits\ApiResponse;
use Modules\System\Position\Http\Requests\PositionRequest;
use Modules\System\Position\Http\Resources\PositionResource;
use Modules\System\Position\Models\Position;
use Modules\System\Position\Services\PositionService;

class PositionController extends ApiController
{
    use ApiResponse;

    public static ?string $model = Position::class;

    public function __construct(protected PositionService $service)
    {
        parent::__construct();
    }

    public function index()
    {
        $data = $this->service->getPaginatedData($this->perPage);

        return $this->sendResponse(
            PositionResource::paginate($data),
            __('Data fetched successfully'),
            StatusCodeEnum::Success->value
        );
    }

    public function store(PositionRequest $request)
    {
        $data =  $this->service->create($request, new Position);

        return $this->sendResponse(
            PositionResource::make($data),
            __('Data created successfully'),
            StatusCodeEnum::Created_successfully->value
        );
    }

    public function show(Position $Position)
    {
        return $this->sendResponse(
            PositionResource::make($Position),
            __('Data fetched successfully'),
            StatusCodeEnum::Success->value
        );
    }

    public function update(PositionRequest $request, int $id)
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

        if (!$deleteStatus) {
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
