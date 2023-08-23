<div>
    <x-heading>
        <x-card.title>{{ __('world::general.states') }}</x-card.title>

        <x-table.search/>

        <x-card.actions>
            @can('delete_states')
                <x-danger-button wire:click="confirm('deleteMany', '{{ __('world::general.are_you_sure_you_want_to_delete_the_selected_states?') }}')"
                                 :disabled="!count($selectedRecords)">{{ __('world::general.delete_states') }}</x-danger-button>
            @endcan
            @can('create_states')
                <x-primary-button-link href="{{ route('world.states.create') }}">{{ __('world::general.create_state') }}</x-primary-button-link>
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
                    @can('delete_states')
                        <x-table.header></x-table.header>
                    @endcan
                    <x-table.header>
                        {{ __('world::general.country') }}
                        @include('components.table.sort', ['column' => 'country'])
                    </x-table.header>
                        <x-table.header>
                            {{ __('world::general.name') }}
                            @include('components.table.sort', ['column' => 'name'])
                        </x-table.header>
                    <x-table.header>
                        {{ __('world::general.code') }}
                        @include('components.table.sort', ['column' => 'code'])
                    </x-table.header>
                    <x-table.header></x-table.header>
                </x-table.row>
            </x-table.head>
            <x-table.body>
                @forelse($states as $state)
                    <x-table.row wireKey="{{ $state->id }}" redirectTo="{{ Gate::allows('view_states') ? route('world.states.show', $state) : false }}">
                        @can('delete_states')
                            <x-table.data-cell class="w-10">
                                <x-checkbox id="ch-{{ $state->id }}" value="{{ $state->id }}" wire:model.live="selectedRecords"/>
                            </x-table.data-cell>
                        @endcan
                        <x-table.data-cell>{{ $state->country->name }}</x-table.data-cell>
                        <x-table.data-cell>{{ $state->name }}</x-table.data-cell>
                        <x-table.data-cell>{{ $state->code }}</x-table.data-cell>
                        <x-table.data-cell class="flex justify-end gap-3">
                            @can('view_states')
                                <x-anchor href="{{ route('world.states.show', $state) }}">
                                    <x-heroicon-o-magnifying-glass/>
                                </x-anchor>
                            @endcan
                            @can('edit_states')
                                <x-anchor href="{{ route('world.states.edit', $state) }}">
                                    <x-heroicon-o-pencil-square/>
                                </x-anchor>
                            @endcan
                            @can('delete_states')
                                <x-anchor wire:click="confirm('delete({{ $state->id }})', '{{ __('world::general.are_you_sure_you_want_to_delete_this_state?') }}')">
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

        {{ $states->links('components.table.pagination') }}

    </x-card>

    @include('partials.modals.confirm')

</div>
