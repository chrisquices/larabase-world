<?php

namespace Modules\World\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\World\Models\Relations\StateRelations;

class State extends Model
{

    use HasFactory, SoftDeletes;
    use StateRelations;

    protected $fillable = [
        'country_id',
        'name',
        'code',
        'latitude',
        'longitude',
    ];

    protected $casts = [
        'deleted_at' => 'datetime',
    ];
}
