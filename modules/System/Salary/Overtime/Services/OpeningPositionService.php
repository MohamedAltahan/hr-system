<?php

namespace Modules\System\Overtime\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Modules\Common\Filters\Common\JsonNameSearch;
use Modules\System\Overtime\Models\Overtime;
use Modules\System\User\Models\User;

class OvertimeService
{
    public function getPaginatedData($perPage)
    {
        return Overtime::withCount('position', 'hiringApplications', 'newHiringApplications')
            ->with('department')
            ->paginate($perPage);
    }

    public function create(Request $request): Model
    {
        $Data = $request->validated();

        return Overtime::create($Data);
    }

    public function update(Request $request, int $id): void
    {
        $model = Overtime::findOrFail($id);
        $data = $request->validated();
        $model->update($data);
    }

    public function destroy(int $id): bool
    {
        $model = Overtime::findOrFail($id);
        return $model->delete();
    }
}
