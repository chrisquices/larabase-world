<div>
    <x-heading>
        <x-card.title>{{ __('world::general.cities') }}</x-card.title>

        <x-table.search/>

        <x-card.actions>
            @can('delete_cities')
                <x-danger-button wire:click="confirm('deleteMany', '{{ __('world::general.are_you_sure_you_want_to_delete_the_selected_cities?') }}')"
                                 :disabled="!count($selectedRecords)">{{ __('world::general.delete_cities') }}</x-danger-button>
            @endcan
            @can('create_cities')
                <x-primary-button-link href="{{ route('world.cities.create') }}">{{ __('world::general.create_city') }}</x-primary-button-link>
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
                    @can('delete_cities')
                        <x-table.header></x-table.header>
                    @endcan
                    <x-table.header>
                        {{ __('world::general.name') }}
                        @include('components.table.sort', ['column' => 'name'])
                    </x-table.header>
                    <x-table.header>
                        {{ __('world::general.state') }}
                        @include('components.table.sort', ['column' => 'state_id'])
                    </x-table.header>
                    <x-table.header>
                        {{ __('world::general.country') }}
                    </x-table.header>
                    <x-table.header></x-table.header>
                </x-table.row>
            </x-table.head>
            <x-table.body>
                @forelse($cities as $city)
                    <x-table.row wireKey="{{ $city->id }}" redirectTo="{{ Gate::allows('view_cities') ? route('world.cities.show', $city) : false }}">
                        @can('delete_cities')
                            <x-table.data-cell class="w-10">
                                <x-checkbox id="ch-{{ $city->id }}" value="{{ $city->id }}" wire:model.live="selectedRecords"/>
                            </x-table.data-cell>
                        @endcan
                        <x-table.data-cell>{{ $city->name }}</x-table.data-cell>
                        <x-table.data-cell>{{ $city->state->name }}</x-table.data-cell>
                        <x-table.data-cell>{{ $city->state->country->name }}</x-table.data-cell>
                        <x-table.data-cell class="flex justify-end gap-3">
                            @can('view_cities')
                                <x-anchor href="{{ route('world.cities.show', $city) }}">
                                    <x-heroicon-o-magnifying-glass/>
                                </x-anchor>
                            @endcan
                            @can('edit_cities')
                                <x-anchor href="{{ route('world.cities.edit', $city) }}">
                                    <x-heroicon-o-pencil-square/>
                                </x-anchor>
                            @endcan
                            @can('delete_cities')
                                <x-anchor wire:click="confirm('delete({{ $city->id }})', '{{ __('world::general.are_you_sure_you_want_to_delete_this_city?') }}')">
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

        {{ $cities->links('components.table.pagination') }}

    </x-card>

    @include('partials.modals.confirm')

</div>
