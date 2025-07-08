<?php

namespace Modules\System\Salary\SalaryStructure\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Modules\System\Salary\SalaryStructure\Models\SalaryStructure;
use Modules\System\Salary\SalaryStructure\Models\StructureComponent;

class SalaryStructureService
{
    public function getPaginatedData($perPage)
    {
        return SalaryStructure::paginate($perPage);
    }

    public function create(Request $request): Model
    {
        $Data = $request->validated();

        return SalaryStructure::create($Data);
    }

    public function update(Request $request, int $id)
    {
        $model = SalaryStructure::findOrFail($id);
        $data = $request->validated();
        $model->update($data);

        return $model;
    }

    public function destroy(int $id): bool
    {
        $checkExists = StructureComponent::where('salary_structure_id', $id)->first();

        if ($checkExists) {
            return false;
        }
        $model = SalaryStructure::findOrFail($id);

        return $model->delete();
    }
}
