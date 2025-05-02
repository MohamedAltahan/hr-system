<?php

namespace Modules\Common\Enums\AccountTree;

enum AccountTreeCategoryEnum: int
{
    case Asset = 1;
    case Liability = 2;
    case Equity = 3;
    case Income = 4;
    case Expense = 5;
}
