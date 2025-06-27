<?php

namespace Modules\System\Attendance\DisciplinaryActions\Http\Controllers;

use Modules\Common\Enums\StatusCodeEnum;
use Modules\Common\Http\Controllers\ApiController;
use Modules\Common\Traits\ApiResponse;
use Modules\System\Attendance\DisciplinaryActions\Http\Requests\DisciplinaryActionsRequest;
use Modules\System\Attendance\DisciplinaryActions\Http\Resources\DisciplinaryActionsResource;
use Modules\System\Attendance\DisciplinaryActions\Models\DisciplinaryActions;
use Modules\System\Attendance\DisciplinaryActions\Services\DisciplinaryActionsService;

class DisciplinaryActionsController extends ApiController
{
    use ApiResponse;

    public static ?string $model = DisciplinaryActions::class;

    public function __construct(protected DisciplinaryActionsService $service)
    {
        parent::__construct();
    }

    public function index()
    {
        $data = $this->service->getPaginatedData($this->perPage);

        return $this->sendResponse(
            DisciplinaryActionsResource::paginate($data),
            __('Data fetched successfully'),
            StatusCodeEnum::Success->value
        );
    }

    public function store(DisciplinaryActionsRequest $request)
    {
        $data = $this->service->create($request);

        if (! $data) {
            return $this->sendResponse(
                [],
                __('You can not add more than one departure per day'),
                StatusCodeEnum::CONFlICT->value
            );
        }

        return $this->sendResponse(
            DisciplinaryActionsResource::make($data),
            __('Data created successfully'),
            StatusCodeEnum::Created_successfully->value
        );
    }

    public function show($id)
    {
        $data = $this->service->show($id);

        return $this->sendResponse(
            DisciplinaryActionsResource::make($data),
            __('Data fetched successfully'),
            StatusCodeEnum::Success->value
        );
    }

    public function update(DisciplinaryActionsRequest $request, int $id)
    {
        $data = $this->service->update($request, $id);

        return $this->sendResponse(
            DisciplinaryActionsResource::make($data),
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
