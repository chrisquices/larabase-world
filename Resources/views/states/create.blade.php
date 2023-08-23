<x-app-layout>
    <x-slot name="title">{{ __('world::general.create_state') }}</x-slot>

    <x-heading>
        <x-card.title>{{ __('world::general.create_state') }}</x-card.title>
    </x-heading>

    <form action="{{ route('world.states.store') }}" method="POST" autocomplete="off" enctype="multipart/form-data" class="space-y-5">
        @csrf

        <x-card class="!py-0">
            <div class="px-2.5 divide-y-[1px] divide-slate-200 dark:divide-slate-700">
                <x-form.row>
                    <x-text-label for="country_id">{{ __('world::general.country') }}</x-text-label>

                    <x-slot name="input">
                        <x-select id="country_id" class="tom-select" required>
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
                    <x-text-label for="name">{{ __('world::general.name') }}</x-text-label>

                    <x-slot name="input">
                        <x-text-input id="name" required/>
                        <x-input-error name="name"/>
                    </x-slot>
                </x-form.row>

                <x-form.row>
                    <x-text-label for="code">{{ __('world::general.code') }}</x-text-label>

                    <x-slot name="input">
                        <x-text-input id="code" required/>
                        <x-input-error name="code"/>
                    </x-slot>
                </x-form.row>
            </div>
        </x-card>

        <x-form.actions>
            <x-anchor href="{{ route('world.states.index') }}" class="font-bold">{{ __('world::general.cancel') }}</x-anchor>
            <x-primary-button>{{ __('world::general.save') }}</x-primary-button>
        </x-form.actions>
    </form>
</x-app-layout>
