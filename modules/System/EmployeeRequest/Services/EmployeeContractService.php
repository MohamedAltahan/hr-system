<?php

namespace Modules\System\EmployeeContract\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Modules\Common\Filters\Common\JsonNameSearch;
use Modules\System\EmployeeContract\Models\EmployeeContract;
use Modules\System\User\Models\User;

class EmployeeContractService
{
    public function getPaginatedData($perPage)
    {
        return EmployeeContract::with(
            'attendanceRule',
            'employee',
            'employee.department',
            'employee.jobTitle',
        )->filter([JsonNameSearch::class])->paginate($perPage);
    }

    public function create(Request $request): Model
    {
        $data = $request->validated();
        return EmployeeContract::create($data);
    }

    public function show(int $id): Model
    {
        return EmployeeContract::findOrFail($id);
    }

    public function update(Request $request, $id): Model
    {
        $model = EmployeeContract::findOrFail($id);
        $data = $request->validated();
        $model->update($data);
        return $model;
    }

    public function destroy(int $id): bool
    {
        $model = EmployeeContract::findOrFail($id);
        return $model->delete();
    }
}
