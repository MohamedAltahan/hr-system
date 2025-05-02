<?php

namespace Modules\Common\Traits;

trait HasLocalizedName
{
    public function getNameAttribute()
    {
        $lang = app()->getLocale();
        $column = "name_$lang";

        return $this->$column ?? ($this->name_ar ?? $this->name_en);
    }
}
