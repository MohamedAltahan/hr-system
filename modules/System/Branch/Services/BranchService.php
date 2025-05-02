<?php

namespace Modules\Erp\Branch\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Modules\Common\Filters\Common\NameSearch;
use Modules\Erp\Branch\Models\Branch;

class BranchService
{
    public function getPaginatedBranchs($perPage)
    {
        return Branch::filter([NameSearch::class])->paginate($perPage);
    }

    public function create(Request $request, Model $model)
    {
        $Data = $request->validated();
        $model::create($Data);
    }

    public function update(Request $request, Model $model)
    {
        $userData = $request->validated();
        $model->update($userData);
    }

    public function destroy(Branch $branch)
    {
        return $branch->delete();
    }
}
