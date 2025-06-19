<?php

namespace Modules\System\JobTitle\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Modules\Common\Filters\Common\JsonNameSearch;
use Modules\System\JobTitle\Models\JobTitle;
use Modules\System\User\Models\User;

class JobTitleService
{
    public function getPaginatedData($perPage)
    {
        return JobTitle::filter([JsonNameSearch::class])->paginate($perPage);
    }

    public function create(Request $request): Model
    {
        $Data = $request->validated();
        return JobTitle::create($Data);
    }

    public function update(Request $request, int $id): void
    {
        $model = JobTitle::findOrFail($id);
        $data = $request->validated();
        $model->update($data);
    }

    public function destroy(int $id): bool
    {
        $model = JobTitle::findOrFail($id);
        $checkExists = User::where('job_title_id', $model->id)->first();

        if ($checkExists) {
            return false;
        }

        return $model->delete();
    }
}
