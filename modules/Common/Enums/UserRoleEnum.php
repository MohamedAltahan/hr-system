<?php

namespace Modules\Common\Enums;

enum UserRoleEnum: int
{
    case SuperAdmin = 1;
    case Admin = 2;
    case User = 3;
}
