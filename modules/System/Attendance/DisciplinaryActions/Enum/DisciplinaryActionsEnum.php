<?php

namespace Modules\System\Attendance\DisciplinaryActions\Enum;

enum DisciplinaryActionsEnum: string
{
    case WARNING = 'warning';
    case DEDUCTION = 'deduction';
    case NOTHING = 'nothing';

    public function label(): string
    {
        return __("$this->value");
    }
}
