<?php

namespace Modules\System\Salary\FlightTicket\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Modules\System\Salary\FlightTicket\Models\FlightTicket;

class FlightTicketService
{
    public function getPaginatedData($perPage)
    {
        return FlightTicket::paginate($perPage);
    }

    public function create(Request $request): Model
    {
        $data = $request->validated();
        return FlightTicket::create($data);
    }

    public function update(Request $request, int $id)
    {
        $model = FlightTicket::findOrFail($id);
        $data = $request->validated();
        $model->update($data);

        return $model;
    }

    public function destroy(int $id): bool
    {
        $model = FlightTicket::findOrFail($id);

        return $model->delete();
    }
}
