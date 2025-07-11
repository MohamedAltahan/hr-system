<?php

namespace Modules\System\MyService\DisciplinaryActionProfile\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Common\Traits\HasPagination;

class DisciplinaryActionProfileResource extends JsonResource
{
    use HasPagination;

    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'action_type' => $this->action_type,
            'reason' => $this->reason,
            'execution_date' => formatDate($this->execution_date),
            'amount' => $this->amount,
            'created_by' => $this->createdBy?->name,
            'status' => $this->status,
        ];
    }
}
