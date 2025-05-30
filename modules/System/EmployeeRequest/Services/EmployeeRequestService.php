<?php

namespace Modules\System\EmployeeRequest\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Modules\Common\Filters\Common\JsonNameSearch;
use Modules\System\EmployeeRequest\Models\EmployeeRequest;

class EmployeeRequestService
{
    public function getPaginatedData($perPage)
    {
        return EmployeeRequest::with(
            'attendanceRule',
            'employee',
            'employee.department',
            'employee.jobTitle',
        )->filter([JsonNameSearch::class])->paginate($perPage);
    }

    public function create(Request $request): Model
    {
        $data = $request->validated();

        return EmployeeRequest::create($data);
    }

    public function show(int $id): Model
    {
        return EmployeeRequest::findOrFail($id);
    }

    public function update(Request $request, $id): Model
    {
        $model = EmployeeRequest::findOrFail($id);
        $data = $request->validated();
        $model->update($data);

        return $model;
    }

    public function destroy(int $id): bool
    {
        $model = EmployeeRequest::findOrFail($id);

        return $model->delete();
    }
}
