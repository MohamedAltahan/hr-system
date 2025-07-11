<?php

namespace Modules\System\MyService\EvaluationProfile\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;
use Modules\Common\Traits\HasPagination;

class EvaluationProfileResource extends JsonResource
{
    use HasPagination;

    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'empoloyee' => [
                'id' => $this->employee->id,
                'name' => $this->employee->name,
            ],
            'evaluation_from' => formatDate($this->evaluation_from),
            'evaluation_to' => formatDate($this->evaluation_to),
            'score' => $this->score,
            'evaluator' => [
                'id' => $this->evaluator->id,
                'name' => $this->evaluator->name,
            ],
            'comment' => $this->comment,
        ];
    }
}
