<?php

namespace Modules\Admin\TenantSidebar\Http\Requests;

use Modules\Common\Http\Requests\ApiRequest;

class TenantSidebarRequest extends ApiRequest
{
    public function rules(): array
    {
        $sidebarItemId = $this->route('tenant-sidebar');

        return [
            'name' => ['required', 'array', 'max:255'],
        ];
    }
}
