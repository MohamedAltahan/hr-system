<?php

namespace Modules\System\Employee\EmployeeAssetType\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Modules\Common\Filters\Common\JsonNameSearch;
use Modules\System\Employee\EmployeeAsset\Models\EmployeeAsset;
use Modules\System\Employee\EmployeeAssetType\Models\EmployeeAssetType;

class EmployeeAssetTypeService
{
    public function getPaginatedData($perPage)
    {
        return EmployeeAssetType::with('branch')->filter([JsonNameSearch::class])->paginate($perPage);
    }

    public function create(Request $request): Model
    {
        $Data = $request->validated();

        return EmployeeAssetType::create($Data);
    }

    public function update(Request $request, $id): void
    {
        $model = EmployeeAssetType::findOrFail($id);
        $data = $request->validated();
        $model->update($data);
    }

    public function destroy(int $id): bool
    {
        $model = EmployeeAssetType::findOrFail($id);

        $checkExists = EmployeeAsset::where('employee_asset_type_id', $id)->first();

        if ($checkExists) {
            return false;
        }

        return $model->delete();
    }
}
