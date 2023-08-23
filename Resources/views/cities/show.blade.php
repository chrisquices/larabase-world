<x-app-layout>
    <x-slot name="title">{{ __('world::general.city_details') }}: {{ $city->name }}</x-slot>

    <x-heading>
        <x-card.title>{{ __('world::general.city_details') }}: {{ $city->name }}</x-card.title>
    </x-heading>

    <x-card class="!py-0">
        <div class="px-2.5 divide-y-[1px] divide-slate-200 dark:divide-slate-700">
            <x-form.row>
                <x-text-label for="name">{{ __('world::general.name') }}</x-text-label>

                <x-slot name="input">
                    <x-form.text>{{ $city->name }}</x-form.text>
                </x-slot>
            </x-form.row>

            <x-form.row>
                <x-text-label for="country">{{ __('world::general.country') }}</x-text-label>

                <x-slot name="input">
                    <x-form.text>{{ $city->state->country->name }}</x-form.text>
                </x-slot>
            </x-form.row>

            <x-form.row>
                <x-text-label for="state">{{ __('world::general.state') }}</x-text-label>

                <x-slot name="input">
                    <x-form.text>{{ $city->state->name }}</x-form.text>
                </x-slot>
            </x-form.row>

            <x-form.row>
                <x-text-label for="latitude">{{ __('world::general.latitude') }}</x-text-label>

                <x-slot name="input">
                    <x-form.text>{{ $city->latitude }}</x-form.text>
                </x-slot>
            </x-form.row>

            <x-form.row>
                <x-text-label for="longitude">{{ __('world::general.longitude') }}</x-text-label>

                <x-slot name="input">
                    <x-form.text>{{ $city->longitude }}</x-form.text>
                </x-slot>
            </x-form.row>
        </div>
    </x-card>

    <x-form.actions>
        <x-anchor href="{{ route('world.cities.index') }}" class="font-bold">{{ __('world::general.cancel') }}</x-anchor>
    </x-form.actions>
</x-app-layout>
