@canany(['list_countries', 'list_states', 'list_cities', 'list_timezones', 'list_languages'])
    <li class="space-y-2"
        x-data="{ show: {{ (request()->is('world/countries', 'world/countries/*', 'world/states', 'world/states/*', 'world/cities', 'world/cities/*', 'world/timezones', 'world/timezones/*', 'world/languages', 'world/languages/*')) ? 'true' : 'false' }} }">
    <span
        @class([
            'menu-dropdown-toggle',
            'bg-primary/10 rounded-lg !text-primary font-medium' => (request()->is('world/countries', 'world/countries/*', 'world/states', 'world/states/*', 'world/cities', 'world/cities/*', 'world/timezones', 'world/timezones/*', 'world/languages', 'world/languages/*'))
        ])
        @click="show = !show" :class="{ 'menu-dropdown-show': show }">
        <x-heroicon-o-globe-alt @class(['!mr-1', '!text-primary' => (request()->is('world/countries', 'world/countries/*', 'world/states', 'world/states/*', 'world/cities', 'world/cities/*', 'world/timezones', 'world/timezones/*', 'world/languages', 'world/languages/*'))])/>
        {{ __('world::general.world') }}
    </span>
        <ul class="menu-dropdown space-y-2" :class="{ 'menu-dropdown-show': show }">
            @can('list_countries')
                <li @class(['bg-primary/10 rounded-lg text-primary font-medium' => (request()->is('world/countries', 'world/countries/*'))])>
                    <a href="{{ route('world.countries.index') }}">{{ __('world::general.countries') }}</a>
                </li>
            @endcan
            @can('list_states')
                <li @class(['bg-primary/10 rounded-lg text-primary font-medium' => (request()->is('world/states', 'world/states/*'))])>
                    <a href="{{ route('world.states.index') }}">{{ __('world::general.states') }}</a>
                </li>
            @endcan
            @can('list_cities')
                <li @class(['bg-primary/10 rounded-lg text-primary font-medium' => (request()->is('world/cities', 'world/cities/*'))])>
                    <a href="{{ route('world.cities.index') }}">{{ __('world::general.cities') }}</a>
                </li>
            @endcan
            @can('list_languages')
                <li @class(['bg-primary/10 rounded-lg text-primary font-medium' => (request()->is('world/languages', 'world/languages/*'))])>
                    <a href="{{ route('world.languages.index') }}">{{ __('world::general.languages') }}</a>
                </li>
            @endcan
        </ul>
    </li>
@endcanany
