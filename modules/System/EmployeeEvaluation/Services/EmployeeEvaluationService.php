<?php

namespace Modules\System\EmployeeEvaluation\Services;

use Modules\Common\Filters\Common\JsonNameSearch;
use Modules\System\EmployeeEvaluation\Models\EmployeeEvaluation;

class EmployeeEvaluationService
{
    public function getPaginatedData($perPage)
    {
        return EmployeeEvaluation::with('employee', 'evaluator')->filter([JsonNameSearch::class])->paginate($perPage);
    }

    public function create($request)
    {
        $Data = $request->validated();

        return EmployeeEvaluation::create($Data);
    }

    public function update($request, $id)
    {
        $evaluation = EmployeeEvaluation::findOrFail($id);
        $userData = $request->validated();

        return $evaluation->update($userData);
    }

    public function destroy($model)
    {
        return $model->delete();
    }
}
