<?php

namespace Modules\System\AttendanceRule\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Modules\Common\Filters\Common\JsonNameSearch;
use Modules\System\AttendanceRule\Models\AttendanceRule;
use Modules\System\User\Models\User;

class AttendanceRuleService
{
    public function getPaginatedData($perPage)
    {
        return AttendanceRule::with('asset', 'manager', 'employee')->filter([JsonNameSearch::class])->paginate($perPage);
    }

    public function create(Request $request): Model
    {
        $data = $request->validated();
        return AttendanceRule::create($data);
    }

    public function update(Request $request, $id): void
    {
        $model = AttendanceRule::findOrFail($id);
        $data = $request->validated();
        $model->update($data);
    }

    public function destroy(int $id): bool
    {
        $model = AttendanceRule::findOrFail($id);
        return $model->delete();
    }
}
