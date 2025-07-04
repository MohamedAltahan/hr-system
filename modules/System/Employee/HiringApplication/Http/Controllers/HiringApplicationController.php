<?php

namespace Modules\System\Employee\HiringApplication\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Common\Enums\StatusCodeEnum;
use Modules\Common\Http\Controllers\ApiController;
use Modules\Common\Traits\ApiResponse;
use Modules\System\Employee\HiringApplication\Http\Requests\HiringApplicationRequest;
use Modules\System\Employee\HiringApplication\Http\Resources\HiringApplicationResource;
use Modules\System\Employee\HiringApplication\Models\HiringApplication;
use Modules\System\Employee\HiringApplication\Services\HiringApplicationService;

class HiringApplicationController extends ApiController
{
    use ApiResponse;

    public static ?string $model = HiringApplication::class;

    public function __construct(protected HiringApplicationService $service)
    {
        parent::__construct();
    }

    public function index()
    {
        $data = $this->service->getPaginatedData($this->perPage);

        return $this->sendResponse(
            HiringApplicationResource::paginate($data),
            __('Data fetched successfully'),
            StatusCodeEnum::Success->value
        );
    }

    public function store(HiringApplicationRequest $request)
    {
        $data = $this->service->create($request);

        return $this->sendResponse(
            HiringApplicationResource::make($data),
            __('Data created successfully'),
            StatusCodeEnum::Created_successfully->value
        );
    }

    public function show(HiringApplication $HiringApplication)
    {
        return $this->sendResponse(
            HiringApplicationResource::make($HiringApplication),
            __('Data fetched successfully'),
            StatusCodeEnum::Success->value
        );
    }

    public function update(HiringApplicationRequest $request, int $id)
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

    public function changeStatus(Request $request)
    {
        $ValidatedData = $request->validate([
            'application_id' => 'required|exists:hiring_applications,id',
            'status' => 'required|in:pending,accepted,rejected',
            'note' => 'nullable|string|max:5000',
        ]);

        $data = HiringApplication::findOrFail($ValidatedData['application_id']);

        $data->update([
            'status' => $ValidatedData['status'],
        ]);

        return $this->sendResponse(
            [],
            __('Data updated successfully'),
            StatusCodeEnum::Success->value
        );
    }
}
