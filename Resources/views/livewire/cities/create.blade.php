<div>
    <x-heading>
        <x-card.title>{{ __('world::general.create_city') }}</x-card.title>
    </x-heading>

    <form action="{{ route('world.cities.store') }}" method="POST" autocomplete="off" enctype="multipart/form-data" class="space-y-5">
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
                    <x-text-label for="country_id">{{ __('world::general.country') }}</x-text-label>

                    <x-slot name="input">
                        <x-select id="country_id" class="tom-select" wire:model.lazy="countryIdSelected" required>
                            <option value="" selected disabled>{{ __('general.select_an_option') }}</option>
                            @foreach($countries as $country)
                                <option value="{{ $country->id }}" @selected(old('country_id') === $country->id)>
                                    {{ $country->name }}
                                </option>
                            @endforeach
                        </x-select>
                        <x-input-error name="country_id"/>
                    </x-slot>
                </x-form.row>

                <x-form.row>
                    <x-text-label for="state_id">{{ __('world::general.state') }}</x-text-label>

                    <x-slot name="input">
                        <x-select id="state_id" class="tom-select" required>
                            @foreach($states as $state)
                                <option value="{{ $state->id }}" @selected(old('state_id') === $state->id)>
                                    {{ $state->name }}
                                </option>
                            @endforeach
                        </x-select>
                        <x-input-error name="state_id"/>
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
            </div>
        </x-card>

        <x-form.actions>
            <x-anchor href="{{ route('world.cities.index') }}" class="font-bold">{{ __('world::general.cancel') }}</x-anchor>
            <x-primary-button>{{ __('world::general.save') }}</x-primary-button>
        </x-form.actions>
    </form>
</div>
