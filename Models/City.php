<?php

namespace Modules\World\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\World\Models\Relations\CityRelations;

class City extends Model
{

    use HasFactory, SoftDeletes;
    use CityRelations;

    protected $fillable = [
        'country_id',
        'state_id',
        'name',
        'latitude',
        'longitude',
    ];

    protected $casts = [
        'deleted_at' => 'datetime',
    ];

}
