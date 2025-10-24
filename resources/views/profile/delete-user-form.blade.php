<div>
    <div class="pt-6 px-6 pb-0 border-b-0 border-solid border-[rgb(0_0_0/0.125)] rounded-t-2xl">
        <div class="flex items-center justify-between">
            <p class="mb-0 text-lg font-bold text-stone-800">{{ __('Delete Account') }}</p>
            <div class='flex items-center font-bold ms-auto'>
                <x-danger-button wire:click="confirmUserDeletion" wire:loading.attr="disabled" class='inline-block'>
                    {{ __('Delete Account') }}
                </x-danger-button>
            </div>
        </div>
    </div>
    <div class='flex-auto px-6 pt-3 pb-6'>
        <p class="text-sm font-bold leading-normal text-stone-700">
            {{ __('Permanently delete your account.') }}
        </p>
        <p class="pt-2 text-sm font-medium leading-normal text-stone-700">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </p>
        <!-- Delete User Confirmation Modal -->
        <x-dialog-modal wire:model.live="confirmingUserDeletion">
            <x-slot name="title">
                {{ __('Delete Account') }}
            </x-slot>

            <x-slot name="content">
                {{ __('Are you sure you want to delete your account? Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}

                <div class="mt-4" x-data="{}" x-on:confirming-delete-user.window="setTimeout(() => $refs.password.focus(), 250)">
                    <x-input type="password" class="block w-3/4 mt-1"
                                autocomplete="current-password"
                                placeholder="{{ __('Password') }}"
                                x-ref="password"
                                wire:model="password"
                                wire:keydown.enter="deleteUser" />

                    <x-input-error for="password" class="mt-2" />
                </div>
            </x-slot>

            <x-slot name="footer">
                <x-secondary-button wire:click="$toggle('confirmingUserDeletion')" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button class="ms-3" wire:click="deleteUser" wire:loading.attr="disabled">
                    {{ __('Delete Account') }}
                </x-danger-button>
            </x-slot>
        </x-dialog-modal>
    </div>
</div>
