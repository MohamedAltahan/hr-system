<?php

namespace Modules\System\Salary\FinancialTransaction\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Modules\System\Salary\FinancialTransaction\Models\FinancialTransaction;

class FinancialTransactionService
{
    public function getPaginatedData($perPage)
    {
        return FinancialTransaction::paginate($perPage);
    }

    public function create(Request $request): Model
    {
        $data = $request->validated();

        return FinancialTransaction::create($data);
    }

    public function update(Request $request, int $id)
    {
        $model = FinancialTransaction::findOrFail($id);
        $data = $request->validated();
        $model->update($data);

        return $model;
    }

    public function destroy(int $id): bool
    {
        $model = FinancialTransaction::findOrFail($id);

        return $model->delete();
    }
}
