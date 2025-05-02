<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Modules\Erp\User\Models\User;

abstract class BasePolicy
{
    use HandlesAuthorization;

    public function viewActionEvent(User $user, Model $model): bool
    {
        $permission = Str::of(class_basename($model))
            ->prepend('view_action_event')
            ->snake()
            ->lower()
            ->toString();

        return $user->can($permission);
    }
}
