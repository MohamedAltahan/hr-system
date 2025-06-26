<?php

namespace Modules\System\Leaves\CarriedForwardLeaves\Http\Requests;

use Modules\Common\Http\Requests\ApiRequest;

class CarriedForwardLeavesRequest extends ApiRequest
{
    public function rules(): array
    {
        return [
            'employee_id' => 'required|exists:users,id',
            'days_balance' => 'required|numeric|min:0|max:100',
            'year' => 'required|numeric|min:0|max:9999',

        ];
    }
}
