<?php

namespace Modules\Admin\Admin\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Common\Traits\HasPagination;

class AdminResource extends JsonResource
{
    use HasPagination;

    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'username' => $this->username,
            'email' => $this->email,
            'phone' => $this->phone,
            // 'account' => AccountInResource::make($this->accountTree),
            'avatar' => $this->avatar ? asset('storage/'.$this->avatar) : '',
            'roles' => $this->role->name,
        ];
    }
}
