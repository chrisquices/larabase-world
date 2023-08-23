<?php

namespace Modules\World\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Language extends Model
{

    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'name_native',
        'code',
        'writing_system',
    ];

    protected $casts = [
        'deleted_at' => 'datetime',
    ];

}
