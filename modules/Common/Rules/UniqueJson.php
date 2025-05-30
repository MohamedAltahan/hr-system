<?php

namespace Modules\Common\Rules;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\DB;

class UniqueJson implements ValidationRule
{
    public function __construct(
        protected string $table,
        protected string $column,
        protected int|object|null $exceptId = null
    ) {}

    public function validate(string $attribute, mixed $value, \Closure $fail): void
    {
        $langs = config('app.supported_languages');

        foreach ($langs as $key) {
            $query = DB::table($this->table)
                ->where("{$this->column}->{$key}", $value[$key] ?? null);

            $exceptId = gettype($this->exceptId) == 'object' ? $this->exceptId->id : $this->exceptId;
            if ($exceptId !== null) {
                $query->where('id', '!=', $exceptId);
            }

            if ($query->exists()) {
                $translatedAttribute = trans("validation.attributes.$attribute");
                $translatedkey = trans("validation.attributes.$key");
                $fail(trans('validation.unique_json', ['attribute' => $translatedAttribute, 'lang' => $translatedkey]));
            }
        }
    }
}
