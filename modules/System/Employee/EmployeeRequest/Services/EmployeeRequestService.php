<?php

namespace Modules\System\Employee\EmployeeRequest\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Modules\System\Employee\EmployeeRequest\Models\EmployeeRequest;

class EmployeeRequestService
{
    public function getPaginatedData($perPage)
    {
        return EmployeeRequest::paginate($perPage);
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

    public function updateStatus(Request $request, int $id): Model
    {
        $model = EmployeeRequest::findOrFail($id);
        $model->status = $request->status;
        $model->manager_comment = $request->manager_comment;
        $model->reviewed_by = user()->id;
        $model->reviewed_at = now();
        $model->save();

        return $model;
    }
}
