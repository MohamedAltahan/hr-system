<?php

namespace Modules\Common\Traits;

use Spatie\Translatable\HasTranslations as SpatieHasTranslations;

trait HasTranslations
{
    use SpatieHasTranslations;

    public function getTranslationsWithNonEmpty(?string $key = null, ?array $allowedLocales = null): ?array
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
