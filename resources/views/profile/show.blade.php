<x-app-layout>
    <x-slot name="header">
        <h6 class="mb-0 text-2xl font-[600] capitalize text-stone-950 tracking-wider">
            {{ __('Profile') }}
        </h6>
    </x-slot>
    <x-guest.profile-card>
        <!-- DATA -->
        <div id="tab-app" class="tab-panel">
            @if (Laravel\Fortify\Features::canUpdateProfileInformation())
            @livewire('profile.update-profile-information-form')
            @endif
        </div>

        <!-- SESSIONS -->
        <div id="tab-messages" class="hidden tab-panel">
            <div class='flex flex-wrap -mx-3'>
                <div class='w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-[0_0_auto]'>
                    <div
                        class="relative flex flex-col min-w-0 px-2 pt-1 break-words bg-white border-0 shadow-xl rounded-2xl bg-clip-border">
                        @livewire('profile.two-factor-authentication-form')
                    </div>
                </div>
                <div class="w-full max-w-full px-3 mt-6 shrink-0 md:w-6/12 md:flex-[0_0_auto] md:mt-0">
                    <div
                        class="relative flex flex-col min-w-0 px-2 pt-1 break-words bg-white border-0 shadow-xl rounded-2xl bg-clip-border">
                        @livewire('profile.logout-other-browser-sessions-form')
                    </div>
                </div>
            </div>
        </div>

        <!-- SETTINGS -->
        <div id="tab-settings" class="hidden tab-panel">
            <div class='flex flex-wrap -mx-3'>
                <div class='w-full max-w-full px-3 shrink-0 md:w-7/12 md:flex-[0_0_auto]'>
                    <div class="relative flex flex-col min-w-0 px-2 pt-1 break-words bg-white border-0 shadow-xl rounded-2xl bg-clip-border">
                        @livewire('profile.update-password-form')
                    </div>
                </div>
                <div class="w-full max-w-full px-3 mt-6 shrink-0 md:w-5/12 md:flex-[0_0_auto] md:mt-0">
                    <div class="relative flex flex-col min-w-0 px-2 pt-1 break-words bg-white border-0 shadow-xl rounded-2xl bg-clip-border">
                        @livewire('profile.delete-user-form')
                    </div>
                </div>
            </div>
        </div>
    </x-guest.profile-card>
</x-app-layout>
