<?php

namespace Modules\System\Salary\Overtime\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Modules\System\Salary\Overtime\Models\Overtime;

class OvertimeService
{
    public function getPaginatedData($perPage)
    {
        return Overtime::paginate($perPage);
    }

    public function create(Request $request): Model
    {
        $Data = $request->validated();

        return Overtime::create($Data);
    }

    public function update(Request $request, int $id)
    {
        $model = Overtime::findOrFail($id);
        $data = $request->validated();
        $model->update($data);

        return $model;
    }

    public function destroy(int $id): bool
    {
        $model = Overtime::findOrFail($id);

        return $model->delete();
    }
}
