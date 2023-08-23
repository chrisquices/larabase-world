<x-app-layout>
    <x-slot name="title">{{ __('world::general.country_details') }}: {{ $country->name }}</x-slot>

    <x-heading>
        <x-card.title>{{ __('world::general.country_details') }}: {{ $country->name }}</x-card.title>
    </x-heading>

    <x-card class="!py-0">
        <div class="px-2.5 divide-y-[1px] divide-slate-200 dark:divide-slate-700">
            <x-form.row>
                <x-text-label for="name">{{ __('world::general.name') }}</x-text-label>

                <x-slot name="input">
                    <x-form.text>{{ $country->name }}</x-form.text>
                </x-slot>
            </x-form.row>

            <x-form.row>
                <x-text-label for="iso2">{{ __('world::general.iso2') }}</x-text-label>

                <x-slot name="input">
                    <x-form.text>{{ $country->iso2 }}</x-form.text>
                </x-slot>
            </x-form.row>

            <x-form.row>
                <x-text-label for="iso3">{{ __('world::general.iso3') }}</x-text-label>

                <x-slot name="input">
                    <x-form.text>{{ $country->iso3 }}</x-form.text>
                </x-slot>
            </x-form.row>

            <x-form.row>
                <x-text-label for="phone_code">{{ __('world::general.phone_code') }}</x-text-label>

                <x-slot name="input">
                    <x-form.text>{{ $country->phone_code }}</x-form.text>
                </x-slot>
            </x-form.row>

            <x-form.row>
                <x-text-label for="region">{{ __('world::general.region') }}</x-text-label>

                <x-slot name="input">
                    <x-form.text>{{ $country->region }}</x-form.text>
                </x-slot>
            </x-form.row>

            <x-form.row>
                <x-text-label for="subregion">{{ __('world::general.subregion') }}</x-text-label>

                <x-slot name="input">
                    <x-form.text>{{ $country->subregion }}</x-form.text>
                </x-slot>
            </x-form.row>

            <x-form.row>
                <x-text-label for="latitude">{{ __('world::general.latitude') }}</x-text-label>

                <x-slot name="input">
                    <x-form.text>{{ $country->latitude }}</x-form.text>
                </x-slot>
            </x-form.row>

            <x-form.row>
                <x-text-label for="longitude">{{ __('world::general.longitude') }}</x-text-label>

                <x-slot name="input">
                    <x-form.text>{{ $country->longitude }}</x-form.text>
                </x-slot>
            </x-form.row>

            <x-form.row>
                <x-text-label for="emoji">{{ __('world::general.emoji') }}</x-text-label>

                <x-slot name="input">
                    <x-form.text>{{ $country->emoji }}</x-form.text>
                </x-slot>
            </x-form.row>
        </div>
    </x-card>

    <x-form.actions>
        <x-anchor href="{{ route('world.countries.index') }}" class="font-bold">{{ __('world::general.cancel') }}</x-anchor>
    </x-form.actions>

</x-app-layout>
