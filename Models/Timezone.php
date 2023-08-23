<?php

namespace Modules\World\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Timezone extends Model
{

    use HasFactory, SoftDeletes;

    protected $fillable = [
        'country_id',
        'name',
    ];

    protected $casts = [
        'deleted_at' => 'datetime',
    ];

}
