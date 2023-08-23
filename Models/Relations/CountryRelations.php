<?php

namespace Modules\World\Models\Relations;

use Modules\World\Models\State;

trait CountryRelations
{
    public function states()
    {
        return $this->hasMany(State::class);
    }
}
