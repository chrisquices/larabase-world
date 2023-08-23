<?php

namespace Modules\World\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\World\Models\Language;

class LanguageSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jsonFile = file_get_contents(base_path('Modules/World/Resources/js/languages.json'));
        $data = json_decode($jsonFile, true);

        foreach ($data as $item) {
            Language::create([
                "name"           => $item['name'],
                "name_native"    => $item['name_native'],
                "code"           => $item['code'],
                "writing_system" => $item['writing_system'],
            ]);
        }
    }
}
