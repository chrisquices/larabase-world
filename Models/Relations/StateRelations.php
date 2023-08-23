<?php

namespace Modules\World\Models\Relations;

use Modules\World\Models\City;
use Modules\World\Models\Country;

trait StateRelations
{
    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function cities()
    {
        return $this->hasMany(City::class);
    }
}
