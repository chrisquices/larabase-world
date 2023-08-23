<x-app-layout>
    <x-slot name="title">{{ __('world::general.create_country') }}</x-slot>

    <x-heading>
        <x-card.title>{{ __('world::general.create_country') }}</x-card.title>
    </x-heading>

    <form action="{{ route('world.countries.store') }}" method="POST" autocomplete="off" enctype="multipart/form-data" class="space-y-5">
        @csrf

        <x-card class="!py-0">
            <div class="px-2.5 divide-y-[1px] divide-slate-200 dark:divide-slate-700">
                <x-form.row>
                    <x-text-label for="name">{{ __('world::general.name') }}</x-text-label>

                    <x-slot name="input">
                        <x-text-input id="name" required/>
                        <x-input-error name="name"/>
                    </x-slot>
                </x-form.row>

                <x-form.row>
                    <x-text-label for="iso2">{{ __('world::general.iso2') }}</x-text-label>

                    <x-slot name="input">
                        <x-text-input id="iso2" required/>
                        <x-input-error name="iso2"/>
                    </x-slot>
                </x-form.row>

                <x-form.row>
                    <x-text-label for="iso3">{{ __('world::general.iso3') }}</x-text-label>

                    <x-slot name="input">
                        <x-text-input id="iso3" required/>
                        <x-input-error name="iso3"/>
                    </x-slot>
                </x-form.row>

                <x-form.row>
                    <x-text-label for="phone_code">{{ __('world::general.phone_code') }}</x-text-label>

                    <x-slot name="input">
                        <x-text-input id="phone_code" required/>
                        <x-input-error name="phone_code"/>
                    </x-slot>
                </x-form.row>

                <x-form.row>
                    <x-text-label for="region">{{ __('world::general.region') }}</x-text-label>

                    <x-slot name="input">
                        <x-select id="region" class="tom-select" required>
                            @foreach($regions as $region)
                                <option value="{{ $region }}" @selected(old('region') === $region)>
                                    {{ $region }}
                                </option>
                            @endforeach
                        </x-select>
                        <x-input-error name="region"/>
                    </x-slot>
                </x-form.row>

                <x-form.row>
                    <x-text-label for="subregion">{{ __('world::general.subregion') }}</x-text-label>

                    <x-slot name="input">
                        <x-select id="subregion" class="tom-select" required>
                            @foreach($subregions as $subregion)
                                <option value="{{ $subregion }}" @selected(old('subregion') === $subregion)>
                                    {{ $subregion }}
                                </option>
                            @endforeach
                        </x-select>
                        <x-input-error name="subregion"/>
                    </x-slot>
                </x-form.row>

                <x-form.row>
                    <x-text-label for="latitude">{{ __('world::general.latitude') }}</x-text-label>

                    <x-slot name="input">
                        <x-text-input id="latitude" required/>
                        <x-input-error name="latitude"/>
                    </x-slot>
                </x-form.row>

                <x-form.row>
                    <x-text-label for="longitude">{{ __('world::general.longitude') }}</x-text-label>

                    <x-slot name="input">
                        <x-text-input id="longitude" required/>
                        <x-input-error name="longitude"/>
                    </x-slot>
                </x-form.row>

                <x-form.row>
                    <x-text-label for="emoji">{{ __('world::general.emoji') }}</x-text-label>

                    <x-slot name="input">
                        <x-text-input id="emoji" required/>
                        <x-input-error name="emoji"/>
                    </x-slot>
                </x-form.row>
            </div>
        </x-card>

        <x-form.actions>
            <x-anchor href="{{ route('world.countries.index') }}" class="font-bold">{{ __('world::general.cancel') }}</x-anchor>
            <x-primary-button>{{ __('world::general.save') }}</x-primary-button>
        </x-form.actions>
    </form>
</x-app-layout>
