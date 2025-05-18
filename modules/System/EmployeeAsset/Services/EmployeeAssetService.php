<?php

namespace Modules\System\EmployeeAsset\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Modules\Common\Filters\Common\JsonNameSearch;
use Modules\System\EmployeeAsset\Models\EmployeeAsset;
use Modules\System\User\Models\User;

class EmployeeAssetService
{
    public function getPaginatedData($perPage)
    {
        return EmployeeAsset::withCount('users')->with('manager')->filter([JsonNameSearch::class])->paginate($perPage);
    }

    public function create(Request $request): Model
    {
        $Data = $request->validated();

        return EmployeeAsset::create($Data);
    }

    public function update(Request $request, $id): void
    {
        $model = EmployeeAsset::findOrFail($id);
        $data = $request->validated();
        $model->update($data);
    }

    public function destroy(int $id): bool
    {
        $model = EmployeeAsset::findOrFail($id);

        $checkExists = User::where('department_id', $model->id)->first();

        if ($checkExists) {
            return false;
        }

        return $model->delete();
    }
}
