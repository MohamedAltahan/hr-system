<?php

namespace Modules\System\Attendance\AttendanceRule\Services;

use Illuminate\Database\Eloquent\Model;
use Modules\Common\Filters\Common\JsonNameSearch;
use Modules\System\Attendance\AttendanceRule\Models\AttendanceRule;
use Modules\System\Employee\EmployeeContract\Models\EmployeeContract;

class AttendanceRuleService
{
    public function getPaginatedData($perPage)
    {
        return AttendanceRule::with('branch')->filter([JsonNameSearch::class])->paginate($perPage);
    }

    public function create($request)
    {
        $data = $request->validated();

        return AttendanceRule::create($data);
    }

    public function show($id): Model
    {
        return AttendanceRule::with('branch')->findOrFail($id);
    }

    public function update($request, $id): void
    {
        $model = AttendanceRule::findOrFail($id);
        $data = $request->validated();
        $model->update($data);
    }

    public function destroy(int $id): bool
    {
        $model = AttendanceRule::findOrFail($id);

        $checkExists = EmployeeContract::where('attendance_rule_id', $model->id)->first();

        if ($checkExists) {
            return false;
        }

        return $model->delete();
    }
}
