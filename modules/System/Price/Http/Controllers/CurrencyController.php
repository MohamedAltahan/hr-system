<?php

namespace Modules\System\Price\Http\Controllers;

use Illuminate\Support\Facades\App;
use Modules\Common\Enums\StatusCodeEnum;
use Modules\Common\Http\Controllers\ApiController;

class CurrencyController extends ApiController
{
    public function __invoke()
    {
        $currencies = config('currencies');

        $data = collect($currencies)->map(function ($names, $code) {
            return [
                'code' => $code,
                'label' => "{$names[App::getLocale()]} ({$code})",
            ];
        })->values();

        return $this->sendResponse(
            $data,
            __('Data fetched successfully'),
            StatusCodeEnum::Success->value
        );
    }
}
