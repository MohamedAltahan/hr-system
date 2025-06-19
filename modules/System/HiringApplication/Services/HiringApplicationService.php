<?php

namespace Modules\System\HiringApplication\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Modules\Common\Filters\Common\JsonNameSearch;
use Modules\System\HiringApplication\Models\HiringApplication;
use Modules\System\User\Models\User;

class HiringApplicationService
{
    public function getPaginatedData($perPage)
    {
        return HiringApplication::where('opening_position_id', request('opening_position_id'))->paginate($perPage);
    }

    public function create(Request $request): Model
    {
        $Data = $request->validated();

        return HiringApplication::create($Data);
    }

    public function update(Request $request, int $id): void
    {
        $model = HiringApplication::findOrFail($id);
        $data = $request->validated();
        $model->update($data);
    }

    public function destroy(int $id): bool
    {
        $model = HiringApplication::findOrFail($id);
        return $model->delete();
    }
}
