<?php

namespace Modules\Common\Traits;

use Spatie\Translatable\HasTranslations as SpatieHasTranslations;

trait TranslateAttributes
{
    use SpatieHasTranslations;

    public function translateAttributes(?string $key = null, ?array $allowedLocales = null): ?array
    {
        return collect($this->getTranslations($key, $allowedLocales))
            ->transform(function ($value, $lcale) {
                if (empty($value)) {
                    return null;
                }

                return $value;
            })->toArray();
    }
}
