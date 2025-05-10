<?php

namespace Modules\System\Position\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Modules\Common\Filters\Common\JsonNameSearch;
use Modules\Common\Filters\Common\NameSearch;
use Modules\System\Position\Models\Position;
use Modules\System\User\Models\User;

class PositionService
{
    public function getPaginatedData($perPage)
    {
        return Position::filter([JsonNameSearch::class])->paginate($perPage);
    }

    public function create(Request $request, Model $model): void
    {
        $Data = $request->validated();
        $model::create($Data);
    }

    public function update(Request $request, Model $model): void
    {
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
