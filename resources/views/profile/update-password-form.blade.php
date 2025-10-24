<form wire:submit="updatePassword" class='p-3'>
    <div class="pt-6 px-6 pb-0 border-b-0 border-solid border-[rgb(0_0_0/0.125)] rounded-t-2xl">
        <div class="flex items-center justify-between">
            <p class="mb-0 -mt-5 text-lg font-bold text-stone-800">{{ __('Update Password') }}</p>
            <div class='flex items-center font-bold ms-auto'>
                <x-action-message class="me-3" on="saved">
                    {{ __('Saved.') }}
                </x-action-message>

                <x-primary-button class='inline-block'>
                    {{ __('Save') }}
                </x-primary-button>
            </div>
        </div>
    </div>
    <div class='flex-auto px-6 pt-3 pb-6'>
        <p class="font-bold leading-normal uppercase text-[13px] text-stone-700 underline">
            {{ __('Profile Information')}}
        </p>
        <p class="pt-2 text-sm font-medium leading-normal text-stone-700">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
        <div class="flex flex-wrap mt-3 -mx-3">
            <!-- Current Password -->
            <div class="w-full max-w-full px-3 shrink-0 md:w-full md:flex-0">
                <div class="mb-4">
                    <x-label for="current_password" value="{{ __('Current Password') }}" />
                    <x-input id="current_password" type="password" class="block w-full mt-1" wire:model="state.current_password" autocomplete="current-password" />
                    <x-input-error for="current_password" class="mt-2" />
                </div>
            </div>

            <!-- New Password -->
            <div class="w-full max-w-full px-3 shrink-0 md:w-full md:flex-0">
                <div class="mb-4">
                    <x-label for="password" value="{{ __('New Password') }}" />
                    <x-input id="password" type="password" class="block w-full mt-1" wire:model="state.password" autocomplete="new-password" />
                    <x-input-error for="password" class="mt-2" />
                </div>
            </div>

            <!-- Confirm Password -->
            <div class="w-full max-w-full px-3 shrink-0 md:w-full md:flex-0">
                <div class="mb-4">
                    <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                    <x-input id="password_confirmation" type="password" class="block w-full mt-1" wire:model="state.password_confirmation" autocomplete="new-password" />
                    <x-input-error for="password_confirmation" class="mt-2" />
                </div>
            </div>
        </div>
    </div>
</form>
