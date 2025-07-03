<?php

namespace Modules\System\Employee\Position\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Modules\Common\Filters\Common\JsonNameSearch;
use Modules\System\Employee\Position\Models\Position;
use Modules\System\User\Models\User;

class PositionService
{
    public function getPaginatedData($perPage)
    {
        return Position::filter([JsonNameSearch::class])->paginate($perPage);
    }

    public function create(Request $request): Model
    {
        $Data = $request->validated();

        return Position::create($Data);
    }

    public function update(Request $request, int $id): void
    {
        $model = Position::findOrFail($id);
        $data = $request->validated();
        $model->update($data);
    }

    public function destroy(int $id): bool
    {
        $model = Position::findOrFail($id);
        $checkExists = User::where('position_id', $model->id)->first();

        if ($checkExists) {
            return false;
        }

        return $model->delete();
    }
}
