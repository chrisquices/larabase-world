<?php

namespace Modules\World\Models\Relations;

use Modules\World\Models\State;

trait CityRelations
{
    public function state()
    {
        return $this->belongsTo(State::class);
    }
}
