<?php

namespace Modules\Admin\Plan\Http\Requests;

use Modules\Common\Http\Requests\ApiRequest;

class PlanRequest extends ApiRequest
{
    public function rules(): array
    {
        $sidebarItemId = $this->route('plan');

        return [
            // 'name' => ['required', 'array', 'max:255'],
        ];
    }
}
