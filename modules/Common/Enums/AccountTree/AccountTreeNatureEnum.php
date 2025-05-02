<?php

namespace Modules\Common\Enums\AccountTree;

enum AccountTreeNatureEnum: string
{
    case Debit = 'debit';
    case credit = 'credit';
    case both = 'both';
}
