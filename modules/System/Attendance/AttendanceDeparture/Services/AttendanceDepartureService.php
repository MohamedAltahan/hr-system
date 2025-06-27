<?php

namespace Modules\System\Attendance\AttendanceDeparture\Services;

use Illuminate\Database\Eloquent\Model;
use Modules\Common\Filters\Common\JsonNameSearch;
use Modules\System\Attendance\AttendanceDeparture\Models\AttendanceDeparture;
use Modules\System\EmployeeContract\Models\EmployeeContract;

class AttendanceDepartureService
{
    public function getPaginatedData($perPage)
    {
        return AttendanceDeparture::with('branch')->filter([JsonNameSearch::class])->paginate($perPage);
    }

    public function create($request)
    {
        $data = $request->validated();

        $checkIn = AttendanceDeparture::where('employee_id', $data['employee_id'])
            ->where('date', $data['date'])
            ->whereNull('check_in')->first();

        $checkOut = AttendanceDeparture::where('employee_id', $data['employee_id'])
            ->where('date', $data['date'])
            ->whereNull('check_out')->first();

        $checkExists = AttendanceDeparture::where('employee_id', $data['employee_id'])->where('date', $data['date'])->first();

        if ($checkIn) {
            $checkIn->update(['check_in' => $data['time']]);

            return $checkIn;
        } elseif ($checkOut) {
            $checkOut->update(['check_out' => $data['time']]);

            return $checkOut;
        } elseif (! $checkIn && ! $checkOut && $data['date'] == date('Y-m-d') && $data['employee_id'] == $checkExists?->employee_id) {
            return false;
        }

        return AttendanceDeparture::create([
            'employee_id' => $data['employee_id'],
            'date' => $data['date'],
            'check_in' => $data['time'],
        ]);
    }

    public function show($id): Model
    {
        return AttendanceDeparture::with('branch')->findOrFail($id);
    }

    public function update($request, $id): void
    {
        $model = AttendanceDeparture::findOrFail($id);
        $data = $request->validated();
        $model->update($data);
    }

    public function destroy(int $id): bool
    {
        $model = AttendanceDeparture::findOrFail($id);

        $checkExists = EmployeeContract::where('attendance_rule_id', $model->id)->first();

        if ($checkExists) {
            return false;
        }

        return $model->delete();
    }
}
