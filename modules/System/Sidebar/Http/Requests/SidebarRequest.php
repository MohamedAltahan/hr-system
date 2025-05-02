<?php

namespace Modules\Erp\Sidebar\Http\Requests;

use Modules\Common\Http\Requests\ApiRequest;

class SidebarRequest extends ApiRequest
{
    public function rules(): array
    {
        $sidebarItemId = $this->route('tenant-sidebar');

        return [
            'name' => ['required', 'array', 'max:255'],
        ];
    }
}
