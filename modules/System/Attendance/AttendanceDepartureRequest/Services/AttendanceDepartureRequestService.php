<?php

namespace Modules\System\Attendance\AttendanceDepartureRequest\Services;

use Illuminate\Database\Eloquent\Model;
use Modules\System\EmployeeRequest\Models\EmployeeRequest;

class AttendanceDepartureRequestService
{
    public function getPaginatedData($perPage)
    {
        return EmployeeRequest::where('type', 'late_arrival')->orWhere('type', 'early_departure')
            ->paginate($perPage);
    }

    public function show($id): Model
    {
        return EmployeeRequest::findOrFail($id);
    }

    public function destroy(int $id): bool
    {
        $model = EmployeeRequest::findOrFail($id);

        return $model->delete();
    }
}
