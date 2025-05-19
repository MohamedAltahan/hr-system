<?php

namespace Modules\System\EmployeeAsset\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Common\Traits\HasPagination;
use Modules\System\User\Http\Resources\UserResource;

class EmployeeAssetResource extends JsonResource
{
    use HasPagination;

    public function toArray(Request $request): array
    {
        return [
            'employee_name' => $this->employee->name,
            'employee_number' => $this->employee->employee_number,
            'asset_type' => $this->asset->name,
            'department' => $this->department->name,
            'manager_name' => $this->manager->name,
            'issue_date' => formatDate($this->issue_date),
            'return_date' => formatDate($this->return_date),
        ];
    }
}
