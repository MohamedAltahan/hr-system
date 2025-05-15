<?php

namespace Modules\System\Branch\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Modules\Common\Filters\Common\JsonNameSearch;
use Modules\Common\Filters\Common\NameSearch;
use Modules\System\Branch\Models\Branch;

class BranchService
{
    public function getPaginatedBranchs($perPage)
    {
        return Branch::filter([JsonNameSearch::class])->paginate($perPage);
    }

    public function create(Request $request)
    {
        $Data = $request->validated();
        return Branch::create($Data);
    }

    public function update(Request $request, $id)
    {
        $model = Branch::findOrFail($id);
        $data = $request->validated();
        $model->update($data);
    }

    public function destroy(Branch $branch)
    {
        return $branch->delete();
    }
}
