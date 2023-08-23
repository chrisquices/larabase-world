<x-app-layout>
    <x-slot name="title">{{ __('world::general.state_details') }}: {{ $state->name }}</x-slot>

    <x-heading>
        <x-card.title>{{ __('world::general.state_details') }}: {{ $state->name }}</x-card.title>
    </x-heading>

    <x-card class="!py-0">
        <div class="px-2.5 divide-y-[1px] divide-slate-200 dark:divide-slate-700">
            <x-form.row>
                <x-text-label for="country">{{ __('world::general.country') }}</x-text-label>

                <x-slot name="input">
                    <x-form.text>{{ $state->country->name }}</x-form.text>
                </x-slot>
            </x-form.row>

            <x-form.row>
                <x-text-label for="name">{{ __('world::general.name') }}</x-text-label>

                <x-slot name="input">
                    <x-form.text>{{ $state->name }}</x-form.text>
                </x-slot>
            </x-form.row>

            <x-form.row>
                <x-text-label for="code">{{ __('world::general.code') }}</x-text-label>

                <x-slot name="input">
                    <x-form.text>{{ $state->code }}</x-form.text>
                </x-slot>
            </x-form.row>
        </div>
    </x-card>

    <x-form.actions>
        <x-anchor href="{{ route('world.states.index') }}" class="font-bold">{{ __('world::general.cancel') }}</x-anchor>
    </x-form.actions>
</x-app-layout>
