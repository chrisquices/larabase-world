<?php

namespace Modules\World\Models\Accessors;

trait CountryAccessors
{
    public function getTranslation($key)
    {
        $translations = json_decode($this->translations, true);

        return $translations[$key] ?? null;
    }
}
