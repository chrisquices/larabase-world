<?php

namespace Modules\World\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\World\Models\Country;
use Modules\World\Models\State;

class StateSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jsonFile = file_get_contents(base_path('Modules/World/Resources/js/states.json'));
        $data = json_decode($jsonFile, true);

        foreach ($data as $item) {
            State::create([
                "country_id" => Country::where('name', $item['country_name'])->first()->id,
                "name"       => $item['name'],
                "code"       => $item['code'],
                "latitude"   => $item['latitude'],
                "longitude"  => $item['longitude'],
            ]);
        }
    }
}
