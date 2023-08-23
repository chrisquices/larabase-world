<x-app-layout>
    <x-slot name="title">{{ __('world::general.update_city') }}: {{ $city->title }}</x-slot>

    <livewire:world::cities.edit :city="$city"/>

</x-app-layout>
