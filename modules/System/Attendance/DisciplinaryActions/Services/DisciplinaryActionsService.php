<?php

namespace Modules\System\Attendance\DisciplinaryActions\Services;

use Illuminate\Database\Eloquent\Model;
use Modules\Common\Filters\Common\JsonNameSearch;
use Modules\System\Attendance\DisciplinaryActions\Models\DisciplinaryActions;
use Modules\System\Employee\EmployeeContract\Models\EmployeeContract;

class DisciplinaryActionsService
{
    public function getPaginatedData($perPage)
    {
        return DisciplinaryActions::with('branch')->filter([JsonNameSearch::class])->paginate($perPage);
    }

    public function create($request)
    {
        $data = $request->validated();
        $data['created_by'] = user()->id;

        return DisciplinaryActions::create($data);
    }

    public function show($id): Model
    {
        return DisciplinaryActions::with('branch')->findOrFail($id);
    }

    public function update($request, $id)
    {
        $model = DisciplinaryActions::findOrFail($id);
        $data = $request->validated();
        $model->update($data);

        return $model;
    }

    public function destroy(int $id): bool
    {
        $model = DisciplinaryActions::findOrFail($id);

        $checkExists = EmployeeContract::where('attendance_rule_id', $model->id)->first();

        if ($checkExists) {
            return false;
        }

        return $model->delete();
    }
}
