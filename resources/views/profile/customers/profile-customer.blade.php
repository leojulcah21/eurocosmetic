<x-guest.customers.profile-card>
    <div class='px-4 py-2'>
        <div class='flex mt-1'>
            <h2 class='text-lg font-extrabold tracking-wider uppercase'>
                {{ __('Edit Profile')}}
            </h2>
        </div>
        <div class='mt-6'>
            @livewire('profile.update-profile-information-form')
        </div>
        <div class='mt-6'>
            @livewire('profile.update-password-form')
        </div>
        <div class='mt-6'>
            @livewire('profile.two-factor-authentication-form')
        </div>
        <div class='mt-6'>
            @livewire('profile.logout-other-browser-sessions-form')
        </div>
        <div class='mt-6'>
            @livewire('profile.delete-user-form')
        </div>
    </div>
</x-guest.customers.profile-card>
