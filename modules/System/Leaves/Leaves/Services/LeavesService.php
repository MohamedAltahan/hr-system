<?php

namespace Modules\System\Leaves\Leaves\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Modules\System\Leaves\Leaves\Models\Leaves;

class LeavesService
{
    public function getPaginatedData($perPage)
    {
        return Leaves::paginate($perPage);
    }

    public function create(Request $request): Model
    {
        $data = $request->validated();
        return Leaves::create($data);
    }

    public function update(Request $request, int $id)
    {
        $model = Leaves::findOrFail($id);
        $data = $request->validated();
        $model->update($data);

        return $model;
    }

    public function destroy(int $id): bool
    {
        $model = Leaves::findOrFail($id);

        return $model->delete();
    }
}
