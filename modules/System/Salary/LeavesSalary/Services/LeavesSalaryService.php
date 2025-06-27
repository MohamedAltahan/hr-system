<?php

namespace Modules\System\Salary\LeavesSalary\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Modules\System\Salary\LeavesSalary\Models\LeavesSalary;

class LeavesSalaryService
{
    public function getPaginatedData($perPage)
    {
        return LeavesSalary::paginate($perPage);
    }

    public function create(Request $request): Model
    {
        $Data = $request->validated();

        return LeavesSalary::create($Data);
    }

    public function update(Request $request, int $id)
    {
        $model = LeavesSalary::findOrFail($id);
        $data = $request->validated();
        $model->update($data);

        return $model;
    }

    public function destroy(int $id): bool
    {
        $model = LeavesSalary::findOrFail($id);

        return $model->delete();
    }
}
