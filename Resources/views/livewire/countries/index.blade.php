<div>
    <x-heading>
        <x-card.title>{{ __('world::general.countries') }}</x-card.title>

        <x-table.search/>

        <x-card.actions>
            @can('delete_countries')
                <x-danger-button wire:click="confirm('deleteMany', '{{ __('world::general.are_you_sure_you_want_to_delete_the_selected_countries?') }}')"
                                 :disabled="!count($selectedRecords)">{{ __('world::general.delete_countries') }}</x-danger-button>
            @endcan
            @can('create_countries')
                <x-primary-button-link href="{{ route('world.countries.create') }}">{{ __('world::general.create_country') }}</x-primary-button-link>
            @endcan
        </x-card.actions>
    </x-heading>

    <x-card>
        <x-card.utilities>
            <x-table.records-per-page-options :recordsPerPageOptions="$recordsPerPageOptions"/>
            <x-table.loader/>

            <x-slot name="filters">
                <x-table.no-filters-found/>
            </x-slot>
        </x-card.utilities>

        <x-table>
            <x-table.head>
                <x-table.row>
                    @can('delete_countries')
                        <x-table.header></x-table.header>
                    @endcan
                    <x-table.header>
                        {{ __('world::general.name') }}
                        @include('components.table.sort', ['column' => 'name'])
                    </x-table.header>
                    <x-table.header>
                        {{ __('world::general.iso3') }}
                        @include('components.table.sort', ['column' => 'iso3'])
                    </x-table.header>
                    <x-table.header>
                        {{ __('world::general.region') }}
                        @include('components.table.sort', ['column' => 'region'])
                    </x-table.header>
                    <x-table.header>
                        {{ __('world::general.subregion') }}
                        @include('components.table.sort', ['column' => 'subregion'])
                    </x-table.header>
                    <x-table.header>
                        {{ __('world::general.emoji') }}
                        @include('components.table.sort', ['column' => 'emoji'])
                    </x-table.header>
                    <x-table.header></x-table.header>
                </x-table.row>
            </x-table.head>
            <x-table.body>
                @forelse($countries as $country)
                    <x-table.row wireKey="{{ $country->id }}" redirectTo="{{ Gate::allows('view_countries') ? route('world.countries.show', $country) : false }}">
                        @can('delete_countries')
                            <x-table.data-cell class="w-10">
                                <x-checkbox id="ch-{{ $country->id }}" value="{{ $country->id }}" wire:model.live="selectedRecords"/>
                            </x-table.data-cell>
                        @endcan
                        <x-table.data-cell>{{ $country->name }}</x-table.data-cell>
                        <x-table.data-cell>{{ $country->iso3 }}</x-table.data-cell>
                        <x-table.data-cell>{{ $country->region }}</x-table.data-cell>
                        <x-table.data-cell>{{ $country->subregion }}</x-table.data-cell>
                        <x-table.data-cell>{{ $country->emoji }}</x-table.data-cell>
                        <x-table.data-cell class="flex justify-end gap-3">
                            @can('view_countries')
                                <x-anchor href="{{ route('world.countries.show', $country) }}">
                                    <x-heroicon-o-magnifying-glass/>
                                </x-anchor>
                            @endcan
                            @can('edit_countries')
                                <x-anchor href="{{ route('world.countries.edit', $country) }}">
                                    <x-heroicon-o-pencil-square/>
                                </x-anchor>
                            @endcan
                            @can('delete_countries')
                                <x-anchor wire:click="confirm('delete({{ $country->id }})', '{{ __('world::general.are_you_sure_you_want_to_delete_this_country?') }}')">
                                    <x-heroicon-o-trash/>
                                </x-anchor>
                            @endcan
                        </x-table.data-cell>
                    </x-table.row>
                @empty
                    <x-table.no-results-found/>
                @endforelse
            </x-table.body>
        </x-table>

        {{ $countries->links('components.table.pagination') }}

    </x-card>

    @include('partials.modals.confirm')

</div>
