<?php

namespace Modules\Common\Http\Controllers;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Routing\Controller;
use Illuminate\Support\Str;
use Modules\Common\Traits\ApiResponse;

class ApiController extends Controller
{
    use ApiResponse;
    use AuthorizesRequests;

    protected ?int $perPage;

    public ?Authenticatable $user;

    public static ?string $model = null;

    public function __construct()
    {
        $this->perPage = request()->input('per_page', 10);

        // if (static::$model) {
        //     $this->authorizeResource(static::$model, Str::snake(class_basename(static::$model)));
        // }
    }
}
