<x-app-layout>
    <x-slot name="header">
        <h6 class="mb-0 text-[17px] font-[600] capitalize text-stone-950 tracking-wider">
            {{ __('Profile') }}
        </h6>
    </x-slot>
    <x-profile-card>
        @if (Laravel\Fortify\Features::canUpdateProfileInformation())
        @livewire('profile.update-profile-information-form')
        @endif
    </x-profile-card>
</x-app-layout>
