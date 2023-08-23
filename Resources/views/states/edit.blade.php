<x-app-layout>
    <x-slot name="title">{{ __('world::general.update_state') }}: {{ $state->title }}</x-slot>

    <x-heading>
        <x-card.title>{{ __('world::general.update_state') }}: {{ $state->title }}</x-card.title>
    </x-heading>

    <form action="{{ route('world.states.update', $state) }}" method="POST" enctype="multipart/form-data" autocomplete="off">
        @csrf
        @method('PATCH')

        <div class="space-y-5">
            <x-card class="!py-0">
                <div class="px-2.5 divide-y-[1px] divide-slate-200 dark:divide-slate-700">
                    <x-form.row>
                        <x-text-label for="name">{{ __('world::general.name') }}</x-text-label>

                        <x-slot name="input">
                            <x-text-input id="name" value="{{ old('name') ?? $state->name }}" required/>
                            <x-input-error name="name"/>
                        </x-slot>
                    </x-form.row>

                    <x-form.row>
                        <x-text-label for="iso2">{{ __('world::general.iso2') }}</x-text-label>

                        <x-slot name="input">
                            <x-text-input id="iso2" value="{{ old('iso2') ?? $state->iso2 }}" required/>
                            <x-input-error name="iso2"/>
                        </x-slot>
                    </x-form.row>

                    <x-form.row>
                        <x-text-label for="iso3">{{ __('world::general.iso3') }}</x-text-label>

                        <x-slot name="input">
                            <x-text-input id="iso3" value="{{ old('iso3') ?? $state->iso3 }}" required/>
                            <x-input-error name="iso3"/>
                        </x-slot>
                    </x-form.row>

                    <x-form.row>
                        <x-text-label for="phone_code">{{ __('world::general.phone_code') }}</x-text-label>

                        <x-slot name="input">
                            <x-text-input id="phone_code" value="{{ old('phone_code') ?? $state->phone_code }}" required/>
                            <x-input-error name="phone_code"/>
                        </x-slot>
                    </x-form.row>

                    <x-form.row>
                        <x-text-label for="region">{{ __('world::general.region') }}</x-text-label>

                        <x-slot name="input">
                            <x-select id="region" class="tom-select" required>
                                @foreach($regions as $region)
                                    <option value="{{ $region }}" @selected(old('region') ?? $state->region === $region)>
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
                                    <option value="{{ $subregion }}" @selected(old('subregion') ?? $state->subregion === $subregion)>
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
                            <x-text-input id="latitude" value="{{ old('latitude') ?? $state->latitude }}" required/>
                            <x-input-error name="latitude"/>
                        </x-slot>
                    </x-form.row>

                    <x-form.row>
                        <x-text-label for="longitude">{{ __('world::general.longitude') }}</x-text-label>

                        <x-slot name="input">
                            <x-text-input id="longitude" value="{{ old('longitude') ?? $state->longitude }}" required/>
                            <x-input-error name="longitude"/>
                        </x-slot>
                    </x-form.row>

                    <x-form.row>
                        <x-text-label for="emoji">{{ __('world::general.emoji') }}</x-text-label>

                        <x-slot name="input">
                            <x-text-input id="emoji" value="{{ old('emoji') ?? $state->emoji }}" required/>
                            <x-input-error name="emoji"/>
                        </x-slot>
                    </x-form.row>
                </div>
            </x-card>
        </div>

        <x-form.actions>
            <x-anchor href="{{ route('world.states.index') }}" class="font-bold">{{ __('world::general.cancel') }}</x-anchor>
            <x-primary-button>{{ __('world::general.update_state') }}</x-primary-button>
        </x-form.actions>
    </form>
</x-app-layout>
