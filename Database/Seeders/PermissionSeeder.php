<?php

namespace Modules\World\Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            // countries
            [
                'category' => 'world::general.countries',
                'name'     => 'world::general.list_countries',
                'code'     => 'list_countries',
            ],
            [
                'category' => 'world::general.countries',
                'name'     => 'world::general.create_countries',
                'code'     => 'create_countries',
            ],
            [
                'category' => 'world::general.countries',
                'name'     => 'world::general.view_countries',
                'code'     => 'view_countries',
            ],
            [
                'category' => 'world::general.countries',
                'name'     => 'world::general.edit_countries',
                'code'     => 'edit_countries',
            ],
            [
                'category' => 'world::general.countries',
                'name'     => 'world::general.delete_countries',
                'code'     => 'delete_countries',
            ],
            // states
            [
                'category' => 'world::general.states',
                'name'     => 'world::general.list_states',
                'code'     => 'list_states',
            ],
            [
                'category' => 'world::general.states',
                'name'     => 'world::general.create_states',
                'code'     => 'create_states',
            ],
            [
                'category' => 'world::general.states',
                'name'     => 'world::general.view_states',
                'code'     => 'view_states',
            ],
            [
                'category' => 'world::general.states',
                'name'     => 'world::general.edit_states',
                'code'     => 'edit_states',
            ],
            [
                'category' => 'world::general.states',
                'name'     => 'world::general.delete_states',
                'code'     => 'delete_states',
            ],
            // cities
            [
                'category' => 'world::general.cities',
                'name'     => 'world::general.list_cities',
                'code'     => 'list_cities',
            ],
            [
                'category' => 'world::general.cities',
                'name'     => 'world::general.create_cities',
                'code'     => 'create_cities',
            ],
            [
                'category' => 'world::general.cities',
                'name'     => 'world::general.view_cities',
                'code'     => 'view_cities',
            ],
            [
                'category' => 'world::general.cities',
                'name'     => 'world::general.edit_cities',
                'code'     => 'edit_cities',
            ],
            [
                'category' => 'world::general.cities',
                'name'     => 'world::general.delete_cities',
                'code'     => 'delete_cities',
            ],
            // timezones
            [
                'category' => 'world::general.timezones',
                'name'     => 'world::general.list_timezones',
                'code'     => 'list_timezones',
            ],
            [
                'category' => 'world::general.timezones',
                'name'     => 'world::general.create_timezones',
                'code'     => 'create_timezones',
            ],
            [
                'category' => 'world::general.timezones',
                'name'     => 'world::general.view_timezones',
                'code'     => 'view_timezones',
            ],
            [
                'category' => 'world::general.timezones',
                'name'     => 'world::general.edit_timezones',
                'code'     => 'edit_timezones',
            ],
            [
                'category' => 'world::general.timezones',
                'name'     => 'world::general.delete_timezones',
                'code'     => 'delete_timezones',
            ],
            // languages
            [
                'category' => 'world::general.languages',
                'name'     => 'world::general.list_languages',
                'code'     => 'list_languages',
            ],
            [
                'category' => 'world::general.languages',
                'name'     => 'world::general.create_languages',
                'code'     => 'create_languages',
            ],
            [
                'category' => 'world::general.languages',
                'name'     => 'world::general.view_languages',
                'code'     => 'view_languages',
            ],
            [
                'category' => 'world::general.languages',
                'name'     => 'world::general.edit_languages',
                'code'     => 'edit_languages',
            ],
            [
                'category' => 'world::general.languages',
                'name'     => 'world::general.delete_languages',
                'code'     => 'delete_languages',
            ],
        ];

        Permission::insert($permissions);
    }
}
