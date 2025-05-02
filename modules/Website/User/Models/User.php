<?php

namespace Modules\Website\User\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Modules\Common\Traits\Filterable;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Translatable\HasTranslations;

// use Modules\Erp\User\Database\Factories\UserFactory;

class User extends Authenticatable
{
    use Filterable;
    use HasApiTokens, HasRoles, Notifiable;
    use HasFactory;
    use HasTranslations;

    protected $translatable = ['address'];

    protected $fillable = [
        'name',
        'username',
        'phone',
        'email',
        'avatar',
        'password',
        'address',
        'status',
        'company_name',
        'domain',
    ];

    protected $casts = [
        'address' => 'array',
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
