<?php

namespace Modules\Common\Traits;

use Illuminate\Support\Facades\DB;

trait ApiResponse
{
    public function sendResponse(mixed $data = [], ?string $message = null, int $code = 200)
    {
        $response = [
            'status' => $code === 200,
            'message' => $message ?? __('Data created successfully'),
            'code' => $code,
            'body' => $data,
            'db' => DB::getDatabaseName(),
        ];

        return response()->json($response, $code);
    }
}
