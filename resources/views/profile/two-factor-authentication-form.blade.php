<div class='p-2'>
    <div class="pt-6 px-6 pb-0 border-b-0 border-solid border-[rgb(0_0_0/0.125)] rounded-t-2xl">
        <div class="flex items-center justify-between">
            <p class="mb-0 -mt-5 text-lg font-bold text-stone-800">{{ __('Two Factor Authentication') }}</p>
            <div class='flex items-center font-bold ms-auto'>
                @if (! $this->enabled)
                    <x-confirms-password wire:then="enableTwoFactorAuthentication">
                        <x-primary-button type="button" wire:loading.attr="disabled">
                            {{ __('Enable') }}
                        </x-primary-button>
                    </x-confirms-password>
                @else
                    @if ($showingRecoveryCodes)
                        <x-confirms-password wire:then="regenerateRecoveryCodes">
                            <x-secondary-button class="me-3">
                                {{ __('Regenerate Recovery Codes') }}
                            </x-secondary-button>
                        </x-confirms-password>
                    @elseif ($showingConfirmation)
                        <x-confirms-password wire:then="confirmTwoFactorAuthentication">
                            <x-primary-button type="button" class="me-3" wire:loading.attr="disabled">
                                {{ __('Confirm') }}
                            </x-primary-button>
                        </x-confirms-password>
                    @else
                        <x-confirms-password wire:then="showRecoveryCodes">
                            <x-secondary-button class="me-3">
                                {{ __('Show Recovery Codes') }}
                            </x-secondary-button>
                        </x-confirms-password>
                    @endif

                    @if ($showingConfirmation)
                        <x-confirms-password wire:then="disableTwoFactorAuthentication">
                            <x-secondary-button wire:loading.attr="disabled">
                                {{ __('Cancel') }}
                            </x-secondary-button>
                        </x-confirms-password>
                    @else
                        <x-confirms-password wire:then="disableTwoFactorAuthentication">
                            <x-danger-button wire:loading.attr="disabled">
                                {{ __('Disable') }}
                            </x-danger-button>
                        </x-confirms-password>
                    @endif
                @endif
            </div>
        </div>
    </div>

    <div class='flex-auto px-6 pt-3 pb-6'>
        <p class="text-sm leading-normal text-stone-700">
            {{ __('Add additional security to your account using two factor authentication.') }}
        </p>
        <p class="pt-2 text-sm font-medium leading-normal text-stone-900">
            @if ($this->enabled)
                @if ($showingConfirmation)
                    {{ __('Finish enabling two factor authentication.') }}
                @else
                    {{ __('You have enabled two factor authentication.') }}
                @endif
            @else
                {{ __('You have not enabled two factor authentication.') }}
            @endif
        </p>
        <p class="pt-3 text-sm leading-normal text-stone-700">
            {{ __('When two factor authentication is enabled, you will be prompted for a secure, random token during authentication. You may retrieve this token from your phone\'s Google Authenticator application.') }}
        </p>

        <div class="flex flex-wrap mt-3 -mx-3">
            @if ($this->enabled)
                @if ($showingQrCode)
                    <div class="max-w-xl mt-4 text-sm text-gray-600">
                        <p class="font-semibold">
                            @if ($showingConfirmation)
                                {{ __('To finish enabling two factor authentication, scan the following QR code using your phone\'s authenticator application or enter the setup key and provide the generated OTP code.') }}
                            @else
                                {{ __('Two factor authentication is now enabled. Scan the following QR code using your phone\'s authenticator application or enter the setup key.') }}
                            @endif
                        </p>
                    </div>

                    <div class="inline-block p-2 mt-4 bg-white">
                        {!! $this->user->twoFactorQrCodeSvg() !!}
                    </div>

                    <div class="max-w-xl mt-4 text-sm text-gray-600">
                        <p class="font-semibold">
                            {{ __('Setup Key') }}: {{ decrypt($this->user->two_factor_secret) }}
                        </p>
                    </div>

                    @if ($showingConfirmation)
                        <!-- Code -->
                        <div class="w-full max-w-full px-3 shrink-0 md:w-full md:flex-0">
                            <div class="mb-4">
                                <x-label for="code" value="{{ __('Code') }}" />
                                <x-input id="code" type="text" name="code" class="block w-full mt-[1px]" inputmode="numeric" autofocus
                                        autocomplete="one-time-code" wire:model="code" wire:keydown.enter="confirmTwoFactorAuthentication" />
                                <x-input-error for="code" class="mt-2" />
                            </div>
                        </div>
                    @endif
                @endif
                @if ($showingRecoveryCodes)
                    <div class="max-w-xl mt-4 text-sm text-gray-600">
                        <p class="font-semibold">
                            {{ __('Store these recovery codes in a secure password manager. They can be used to recover access to your account if your two factor authentication device is lost.') }}
                        </p>
                    </div>

                    <div class="grid max-w-xl gap-1 px-4 py-4 mt-4 font-mono text-sm bg-gray-100 rounded-lg">
                        @foreach (json_decode(decrypt($this->user->two_factor_recovery_codes), true) as $code)
                            <div>{{ $code }}</div>
                        @endforeach
                    </div>
                @endif
            @endif
        </div>
    </div>
</div>


