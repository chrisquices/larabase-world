<?php

namespace Modules\World\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\World\Models\City;
use Modules\World\Models\State;

class CitySeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        for ($i = 1; $i < 4; $i++) {
//            $jsonFile = file_get_contents(base_path("Modules/World/Resources/js/cities_$i.json"));
//            $data = json_decode($jsonFile, true);
//
//            foreach ($data as $item) {
//
//                $state = State::where('name', $item['state_name'])->first();
//
//                if ($state) {
//                    City::create([
//                        "state_id"  => $state->id,
//                        "name"      => $item['name'],
//                        "latitude"  => $item['latitude'],
//                        "longitude" => $item['longitude'],
//                    ]);
//                }
//            }
//        }
    }
}
