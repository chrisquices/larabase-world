<?php

namespace Modules\World\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\World\Models\Relations\CountryRelations;

class Country extends Model
{

    use HasFactory, SoftDeletes;
    use CountryRelations;

    protected $fillable = [
        'iso2',
        'iso3',
        'name',
        'phone_code',
        'region',
        'subregion',
        'translations',
        'latitude',
        'longitude',
        'emoji',
    ];

    protected $casts = [
        'deleted_at' => 'datetime',
    ];

    public function getTranslation($key)
    {
        $translations = json_decode($this->translations, true);

        return $translations[$key] ?? null;
    }

}
