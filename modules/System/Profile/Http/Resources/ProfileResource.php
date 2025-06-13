<?php

namespace Modules\System\Profile\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Common\Traits\HasPagination;

class ProfileResource extends JsonResource
{
    use HasPagination;

    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'email' => $this->email,
            'phone' => $this->phone,
            'avatar' => $this->avatar ? asset($this->avatar) : '',
            'translations' => $this->getTranslations(),
        ];
    }
}
