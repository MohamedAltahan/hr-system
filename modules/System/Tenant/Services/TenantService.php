<?php

namespace Modules\System\Tenant\Services;

use Modules\Common\Filters\Common\JsonNameSearch;
use Modules\Common\Traits\UploadFile;
use Modules\System\Tenant\Http\Requests\TenantRequest;
use Modules\System\Tenant\Models\Tenant;

class TenantService
{
    use UploadFile;

    public function getPaginatedTenants($perPage)
    {
        return Tenant::with('plan')->where('domain', '!=', config('app.owner_domain'))
            ->filter([JsonNameSearch::class])->paginate($perPage);
    }

    public function create(TenantRequest $request)
    {
        return Tenant::create($request->validated());
    }

    public function update(TenantRequest $request, int $id)
    {
        $tenant = Tenant::findOrFail($id);

        return $tenant->update($request->validated());
    }

    public function getTenant($id)
    {
        return Tenant::where('domain', '!=', config('app.owner_domain'))->where('id', $id)->firstOrFail();
    }

    public function destroy(Tenant $tenant)
    {

        if ($tenant->domain == config('app.owner_domain')) {
            return false;
        }

        return $tenant->delete();
    }
}
