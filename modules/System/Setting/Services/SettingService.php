<?php

namespace Modules\System\Setting\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Modules\Common\Filters\Common\JsonNameSearch;
use Modules\System\Setting\Models\Setting;
use Modules\System\User\Models\User;

class SettingService
{
    public function getPaginatedData($perPage)
    {
        return Setting::withCount('users')->with('manager')->filter([JsonNameSearch::class])->paginate($perPage);
    }

    public function create(Request $request): Model
    {
        $Data = $request->validated();

        return Setting::create($Data);
    }

    public function update(Request $request, $id): void
    {
        $model = Setting::findOrFail($id);
        $data = $request->validated();
        $model->update($data);
    }

    public function destroy(int $id): bool
    {
        $model = Setting::findOrFail($id);

        $checkExists = User::where('department_id', $model->id)->first();

        if ($checkExists) {
            return false;
        }

        return $model->delete();
    }
}
