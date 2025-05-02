<?php

namespace Modules\Common\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class NameRule implements ValidationRule
{
    protected string $column;

    protected ?string $otherField;

    protected ?int $ignoreId;

    public function __construct(string $column, ?string $otherField = null, ?int $ignoreId = null)
    {
        $this->column = $column;
        $this->otherField = $otherField;
        $this->ignoreId = $ignoreId;
    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // If both fields are empty, fail
        if (empty($value) && request()->input($this->otherField) === null) {
            $fail("Either $this->column or $this->otherField is required.");

            return;
        }

        // Check max length
        if (! empty($value) && Str::length($value) > 50) {
            $fail("The $this->column may not be greater than 50 characters.");

            return;
        }

        // Check uniqueness
        $query = DB::table('users')
            ->where($this->column, $value);

        if ($this->ignoreId) {
            $query->where('id', '!=', $this->ignoreId);
        }

        if (! empty($value) && $query->exists()) {
            $fail("The $this->column has already been taken.");
        }
    }
}
