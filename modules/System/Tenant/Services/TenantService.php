<?php

namespace Modules\System\Tenant\Services;

use Modules\Common\Traits\UploadFile;
use Modules\System\Tenant\Http\Requests\TenantRequest;
use Modules\System\Tenant\Models\Tenant;

class TenantService
{
    use UploadFile;

    public function getPaginatedTenants($perPage)
    {
        return Tenant::paginate($perPage);
    }

    public function create(TenantRequest $request)
    {
        return Tenant::create($request->validated());
    }

    public function update(TenantRequest $request, int $id)
    {
        $tenant = Tenant::findOrFail($id);
        $validatedData = $request->validated();

        if ($tenant->domain == config('app.owner_domain')) {
            unset($validatedData['is_active']);
        }

        if ($tenant->domain != config('app.owner_domain')) {
            $tenant->domains()->update([
                'domain' => $request->domain,
            ]);
        }

        return $tenant->update($validatedData);
    }

    public function getTenant($id)
    {
        return Tenant::where('id', $id)->firstOrFail();
    }

    public function destroy($tenant)
    {
        if ($tenant->domain == config('app.owner_domain')) {
            return false;
        }

        return $tenant->delete();
    }
}
