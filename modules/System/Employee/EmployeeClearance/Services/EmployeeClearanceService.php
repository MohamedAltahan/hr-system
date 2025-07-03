<?php

namespace Modules\System\Employee\EmployeeClearance\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Modules\System\Employee\EmployeeClearance\Models\EmployeeClearance;

class EmployeeClearanceService
{
    public function getPaginatedData($perPage)
    {
        return EmployeeClearance::paginate($perPage);
    }

    public function create(Request $request): Model
    {
        $data = $request->validated();

        return EmployeeClearance::create($data);
    }

    public function show(int $id): Model
    {
        return EmployeeClearance::findOrFail($id);
    }

    public function update(Request $request, $id): Model
    {
        $model = EmployeeClearance::findOrFail($id);
        $data = $request->validated();
        $model->update($data);

        return $model;
    }

    public function destroy(int $id): bool
    {
        $model = EmployeeClearance::findOrFail($id);

        return $model->delete();
    }

    public function updateStatus(Request $request, int $id): Model
    {
        $model = EmployeeClearance::findOrFail($id);
        $model->status = $request->status;
        $model->save();

        return $model;
    }
}
