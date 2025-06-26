<?php

namespace Modules\System\Leaves\CarriedForwardLeaves\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Modules\System\Leaves\CarriedForwardLeaves\Models\CarriedForwardLeaves;

class CarriedForwardLeavesService
{
    public function getPaginatedData($perPage)
    {
        return CarriedForwardLeaves::paginate($perPage);
    }

    public function create(Request $request): Model
    {
        $data = $request->validated();
        return CarriedForwardLeaves::create($data);
    }

    public function update(Request $request, int $id)
    {
        $model = CarriedForwardLeaves::findOrFail($id);
        $data = $request->validated();
        $model->update($data);

        return $model;
    }

    public function destroy(int $id): bool
    {
        $model = CarriedForwardLeaves::findOrFail($id);

        return $model->delete();
    }
}
