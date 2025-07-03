<?php

namespace Modules\System\Employee\EmployeeAsset\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Modules\Common\Filters\Common\JsonNameSearch;
use Modules\System\Employee\EmployeeAsset\Models\EmployeeAsset;

class EmployeeAssetService
{
    public function getPaginatedData($perPage)
    {
        return EmployeeAsset::with('asset', 'manager', 'employee')->filter([JsonNameSearch::class])->paginate($perPage);
    }

    public function create(Request $request): Model
    {
        $data = $request->validated();

        return EmployeeAsset::create($data);
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

        return $model->delete();
    }
}
