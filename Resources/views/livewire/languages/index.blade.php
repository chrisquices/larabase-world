<div>
    <x-heading>
        <x-card.title>{{ __('world::general.languages') }}</x-card.title>

        <x-table.search/>

        <x-card.actions>
            @can('delete_languages')
                <x-danger-button wire:click="confirm('deleteMany', '{{ __('world::general.are_you_sure_you_want_to_delete_the_selected_languages?') }}')"
                                 :disabled="!count($selectedRecords)">{{ __('world::general.delete_languages') }}</x-danger-button>
            @endcan
            @can('create_languages')
                <x-primary-button-link href="{{ route('world.languages.create') }}">{{ __('world::general.create_language') }}</x-primary-button-link>
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
                    @can('delete_languages')
                        <x-table.header></x-table.header>
                    @endcan
                    <x-table.header>
                        {{ __('world::general.name') }}
                        @include('components.table.sort', ['column' => 'name'])
                    </x-table.header>
                    <x-table.header>
                        {{ __('world::general.name_native') }}
                        @include('components.table.sort', ['column' => 'iso3'])
                    </x-table.header>
                    <x-table.header>
                        {{ __('world::general.code') }}
                        @include('components.table.sort', ['column' => 'region'])
                    </x-table.header>
                    <x-table.header>
                        {{ __('world::general.writing_system') }}
                        @include('components.table.sort', ['column' => 'subregion'])
                    </x-table.header>
                    <x-table.header></x-table.header>
                </x-table.row>
            </x-table.head>
            <x-table.body>
                @forelse($languages as $language)
                    <x-table.row wireKey="{{ $language->id }}" redirectTo="{{ Gate::allows('view_languages') ? route('world.languages.show', $language) : false }}">
                        @can('delete_languages')
                            <x-table.data-cell class="w-10">
                                <x-checkbox id="ch-{{ $language->id }}" value="{{ $language->id }}" wire:model.live="selectedRecords"/>
                            </x-table.data-cell>
                        @endcan
                        <x-table.data-cell>{{ $language->name }}</x-table.data-cell>
                        <x-table.data-cell>{{ $language->name_native }}</x-table.data-cell>
                        <x-table.data-cell>{{ $language->code }}</x-table.data-cell>
                        <x-table.data-cell>{{ $language->writing_system }}</x-table.data-cell>
                        <x-table.data-cell class="flex justify-end gap-3">
                            @can('view_languages')
                                <x-anchor href="{{ route('world.languages.show', $language) }}">
                                    <x-heroicon-o-magnifying-glass/>
                                </x-anchor>
                            @endcan
                            @can('edit_languages')
                                <x-anchor href="{{ route('world.languages.edit', $language) }}">
                                    <x-heroicon-o-pencil-square/>
                                </x-anchor>
                            @endcan
                            @can('delete_languages')
                                <x-anchor wire:click="confirm('delete({{ $language->id }})', '{{ __('world::general.are_you_sure_you_want_to_delete_this_language?') }}')">
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

        {{ $languages->links('components.table.pagination') }}

    </x-card>

    @include('partials.modals.confirm')

</div>
