<?php

namespace Modules\System\OpeningPosition\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Modules\Common\Filters\Common\JsonNameSearch;
use Modules\System\OpeningPosition\Models\OpeningPosition;
use Modules\System\User\Models\User;

class OpeningPositionService
{
    public function getPaginatedData($perPage)
    {
        return OpeningPosition::withCount('position', 'hiringApplications', 'newHiringApplications')
            ->with('department')
            ->paginate($perPage);
    }

    public function create(Request $request): Model
    {
        $Data = $request->validated();

        return OpeningPosition::create($Data);
    }

    public function update(Request $request, int $id): void
    {
        $model = OpeningPosition::findOrFail($id);
        $data = $request->validated();
        $model->update($data);
    }

    public function destroy(int $id): bool
    {
        $model = OpeningPosition::findOrFail($id);
        return $model->delete();
    }
}
