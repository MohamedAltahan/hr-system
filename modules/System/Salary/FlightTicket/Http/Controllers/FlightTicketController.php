<?php

namespace Modules\System\Salary\FlightTicket\Http\Controllers;

use Modules\Common\Enums\StatusCodeEnum;
use Modules\Common\Http\Controllers\ApiController;
use Modules\Common\Traits\ApiResponse;
use Modules\System\Salary\FlightTicket\Http\Requests\FlightTicketRequest;
use Modules\System\Salary\FlightTicket\Http\Resources\FlightTicketListResource;
use Modules\System\Salary\FlightTicket\Http\Resources\FlightTicketResource;
use Modules\System\Salary\FlightTicket\Models\FlightTicket;
use Modules\System\Salary\FlightTicket\Services\FlightTicketService;

class FlightTicketController extends ApiController
{
    use ApiResponse;

    public static ?string $model = FlightTicket::class;

    public function __construct(protected FlightTicketService $service)
    {
        parent::__construct();
    }

    public function index()
    {
        $data = $this->service->getPaginatedData($this->perPage);

        return $this->sendResponse(
            FlightTicketResource::paginate($data),
            __('Data fetched successfully'),
            StatusCodeEnum::Success->value
        );
    }

    public function store(FlightTicketRequest $request)
    {
        $data = $this->service->create($request);

        return $this->sendResponse(
            FlightTicketResource::make($data),
            __('Data created successfully'),
            StatusCodeEnum::Created_successfully->value
        );
    }

    public function show(FlightTicket $FlightTicket)
    {
        return $this->sendResponse(
            FlightTicketResource::make($FlightTicket),
            __('Data fetched successfully'),
            StatusCodeEnum::Success->value
        );
    }

    public function update(FlightTicketRequest $request, int $id)
    {
        $data = $this->service->update($request, $id);

        return $this->sendResponse(
            FlightTicketResource::make($data),
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
