<?php

namespace Modules\System\Salary\SalaryStructure\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Modules\System\Salary\SalaryStructure\Models\SalaryComponent;
use Modules\System\Salary\SalaryStructure\Models\SalaryStructure;
use Modules\System\Salary\SalaryStructure\Models\StructureComponent;


class StructureComponentService
{
    public function getPaginatedData($perPage)
    {
        $salaryStructure = SalaryStructure::findOrFail(2);

        $salaryComponents = $salaryStructure->salaryComponents()->paginate($perPage);

        return $salaryComponents;
    }

    public function create(Request $request): Model
    {
        $Data = $request->validated();

        return StructureComponent::create($Data);
    }

    public function update(Request $request, int $id)
    {
        $model = StructureComponent::findOrFail($id);
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
        $model = StructureComponent::findOrFail($id);

        return $model->delete();
    }
}
