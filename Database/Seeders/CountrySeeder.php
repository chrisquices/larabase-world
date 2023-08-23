<?php

namespace Modules\World\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\World\Models\Country;

class CountrySeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jsonFile = file_get_contents(base_path('Modules/World/Resources/js/countries.json'));
        $data = json_decode($jsonFile, true);

        foreach ($data as $item) {

            Country::create([
                "iso2"         => $item['iso2'],
                "iso3"         => $item['iso3'],
                "name"         => $item['name'],
                "phone_code"   => $item['phone_code'],
                "region"       => $item['region'],
                "subregion"    => $item['subregion'],
                "translations" => json_encode($item['translations']),
                "latitude"     => $item['latitude'],
                "longitude"    => $item['longitude'],
                "emoji"        => $item['emoji'],
            ]);
        }
    }
}
