<?php

namespace Modules\System\Employee\Position\Http\Requests;

use Modules\Common\Http\Requests\ApiRequest;
use Modules\Common\Rules\UniqueJson;

class PositionRequest extends ApiRequest
{
    public function rules(): array
    {
        $position_id = $this->route('position');

        return [
            'name' => ['required', 'array', 'max:255'],
            'name' => [new UniqueJson('positions', 'name', $position_id)],
        ];
    }
}
