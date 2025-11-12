<div class='p-2'>
    <div class="pt-6 px-6 pb-0.5 border-b-0 border-solid border-[rgb(0_0_0/0.125)] rounded-t-2xl">
        <div class="flex items-center justify-between">
            <p class="mb-0 text-lg font-bold text-stone-800">{{ __('Browser Sessions') }}</p>
            <div class='flex items-center font-bold ms-auto'>
                <x-button variant="gradient" color="primary" shadow="glow" class='inline-block' wire:click="confirmLogout" wire:loading.attr="disabled">
                    {{ __('Log Out Other Browser Sessions') }}
                </x-button>
                <x-secondary-button class="hidden ms-3" on="loggedOut">
                    {{ __('Done.') }}
                </x-secondary-button>
            </div>
        </div>
    </div>
    <div class='flex-auto px-6 pt-3 pb-6'>
        <p class="text-sm font-medium leading-normal text-stone-700">
            {{ __('Manage and log out your active sessions on other browsers and devices.') }}
        </p>
        <p class="pt-2 text-sm leading-normal text-stone-700">
            {{ __('If necessary, you may log out of all of your other browser sessions across all of your devices. Some of your recent sessions are listed below; however, this list may not be exhaustive. If you feel your account has been compromised, you should also update your password.') }}
        </p>
        <div class="flex flex-wrap mt-3">

        </div>
    </div>
    <!-- Log Out Other Devices Confirmation Modal -->
    <x-dialog-modal wire:model.live="confirmingLogout">
        <x-slot name="title">
            {{ __('Log Out Other Browser Sessions') }}
        </x-slot>

        <x-slot name="content">
            {{ __('Please enter your password to confirm you would like to log out of your other browser sessions
            across all of your devices.') }}

            <div class="mt-4" x-data="{}"
                x-on:confirming-logout-other-browser-sessions.window="setTimeout(() => $refs.password.focus(), 250)">
                <x-input type="password" class="block w-3/4 mt-1" autocomplete="current-password"
                    placeholder="{{ __('Password') }}" x-ref="password" wire:model="password"
                    wire:keydown.enter="logoutOtherBrowserSessions" />

                <x-input-error for="password" class="mt-2" />
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$toggle('confirmingLogout')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-primary-button class="ms-3" wire:click="logoutOtherBrowserSessions" wire:loading.attr="disabled">
                {{ __('Log Out Other Browser Sessions') }}
            </x-primary-button>
        </x-slot>
    </x-dialog-modal>
</div>
