<?php

namespace Modules\Erp\AccountTree\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AccountTreeDetailsResource extends JsonResource
{
    public function toArray(Request $request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'account_code' => $this->account_code,
            'account_type' => $this->account_type,
            'account_nature' => $this->account_nature,
            'is_active' => $this->is_active,
        ];
    }
}
