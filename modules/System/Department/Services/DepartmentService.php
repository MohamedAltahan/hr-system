<?php

namespace Modules\System\Department\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Modules\Common\Filters\Common\JsonNameSearch;
use Modules\System\Department\Models\Department;
use Modules\System\User\Models\User;

class DepartmentService
{
    public function getPaginatedData($perPage)
    {
        return Department::withCount('users')->with('manager')->filter([JsonNameSearch::class])->paginate($perPage);
    }

    public function create(Request $request): Model
    {
        $Data = $request->validated();

        return Department::create($Data);
    }

    public function update(Request $request, $id): void
    {
        $model = Department::findOrFail($id);
        $data = $request->validated();
        $model->update($data);
    }

    public function destroy(int $id): bool
    {
        $model = Department::findOrFail($id);

        $checkExists = User::where('department_id', $model->id)->first();

        if ($checkExists) {
            return false;
        }

        return $model->delete();
    }
}
