<x-app-layout>
    <x-slot name="title">{{ __('world::general.language_details') }}: {{ $language->name }}</x-slot>

    <x-heading>
        <x-card.title>{{ __('world::general.language_details') }}: {{ $language->name }}</x-card.title>
    </x-heading>

    <x-card class="!py-0">
        <div class="px-2.5 divide-y-[1px] divide-slate-200 dark:divide-slate-700">
            <x-form.row>
                <x-text-label for="name">{{ __('world::general.name') }}</x-text-label>

                <x-slot name="input">
                    <x-form.text>{{ $language->name }}</x-form.text>
                </x-slot>
            </x-form.row>

            <x-form.row>
                <x-text-label for="name_native">{{ __('world::general.name_native') }}</x-text-label>

                <x-slot name="input">
                    <x-form.text>{{ $language->name_native }}</x-form.text>
                </x-slot>
            </x-form.row>

            <x-form.row>
                <x-text-label for="code">{{ __('world::general.code') }}</x-text-label>

                <x-slot name="input">
                    <x-form.text>{{ $language->code }}</x-form.text>
                </x-slot>
            </x-form.row>

            <x-form.row>
                <x-text-label for="writing_system">{{ __('world::general.writing_system') }}</x-text-label>

                <x-slot name="input">
                    <x-form.text>{{ $language->writing_system }}</x-form.text>
                </x-slot>
            </x-form.row>
        </div>
    </x-card>

    <x-form.actions>
        <x-anchor href="{{ route('world.languages.index') }}" class="font-bold">{{ __('world::general.cancel') }}</x-anchor>
    </x-form.actions>

</x-app-layout>
