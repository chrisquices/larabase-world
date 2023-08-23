<x-app-layout>
    <x-slot name="title">{{ __('world::general.create_language') }}</x-slot>

    <x-heading>
        <x-card.title>{{ __('world::general.create_language') }}</x-card.title>
    </x-heading>

    <form action="{{ route('world.languages.store') }}" method="POST" autocomplete="off" enctype="multipart/form-data" class="space-y-5">
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
                    <x-text-label for="name_native">{{ __('world::general.name_native') }}</x-text-label>

                    <x-slot name="input">
                        <x-text-input id="name_native" required/>
                        <x-input-error name="name_native"/>
                    </x-slot>
                </x-form.row>

                <x-form.row>
                    <x-text-label for="code">{{ __('world::general.code') }}</x-text-label>

                    <x-slot name="input">
                        <x-text-input id="code" required/>
                        <x-input-error name="code"/>
                    </x-slot>
                </x-form.row>

                <x-form.row>
                    <x-text-label for="writing_system">{{ __('world::general.writing_system') }}</x-text-label>

                    <x-slot name="input">
                        <x-select id="writing_system" class="tom-select" required>
                            <option value="" selected disabled>{{ __('general.select_an_option') }}</option>
                            <option value="ltr" @selected(old('writing_system') == 'ltr')>{{ __('world::general.ltr') }}</option>
                            <option value="rtl" @selected(old('writing_system') == 'rtl')>{{ __('world::general.rtl') }}</option>
                        </x-select>
                        <x-input-error name="writing_system"/>
                    </x-slot>
                </x-form.row>
            </div>
        </x-card>

        <x-form.actions>
            <x-anchor href="{{ route('world.languages.index') }}" class="font-bold">{{ __('world::general.cancel') }}</x-anchor>
            <x-primary-button>{{ __('world::general.save') }}</x-primary-button>
        </x-form.actions>
    </form>
</x-app-layout>
