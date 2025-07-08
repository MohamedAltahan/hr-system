<?php

namespace Modules\System\Salary\SalaryStructure\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Modules\System\Salary\SalaryStructure\Models\SalaryComponent;
use Modules\System\Salary\SalaryStructure\Models\StructureComponent;

class SalaryComponentService
{
    public function getPaginatedData($perPage)
    {
        return SalaryComponent::paginate($perPage);
    }

    public function create(Request $request): Model
    {
        $Data = $request->validated();

        return SalaryComponent::create($Data);
    }

    public function update(Request $request, int $id)
    {
        $model = SalaryComponent::findOrFail($id);
        $data = $request->validated();
        $model->update($data);

        return $model;
    }

    public function destroy(int $id): bool
    {
        $checkExists = StructureComponent::where('salary_component_id', $id)->first();

        if ($checkExists) {
            return false;
        }
        $model = SalaryComponent::findOrFail($id);

        return $model->delete();
    }
}
