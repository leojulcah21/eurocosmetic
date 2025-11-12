<div class='p-2'>
    <div class="pt-6 px-6 pb-0 border-b-0 border-solid border-[rgb(0_0_0/0.125)] rounded-t-2xl">
        <div class="flex items-center justify-between">
            <p class="mb-0 -mt-5 text-lg font-bold text-stone-800">
                {{ __('Two Factor Authentication') }}
            </p>
            <div class='flex items-center font-bold ms-auto'>
                @if (! $this->enabled)
                    <x-confirms-password wire:then="enableTwoFactorAuthentication">
                        <x-button variant="gradient" color="primary" shadow="glow" type="button" wire:loading.attr="disabled">
                            <x-slot:icon>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 mr-2" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <path d="M12 3a12 12 0 0 0 8.5 3a12 12 0 0 1 -8.5 15a12 12 0 0 1 -8.5 -15a12 12 0 0 0 8.5 -3" />
                                    <path d="M12 11m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                                    <path d="M12 12l0 2.5" />
                                </svg>
                            </x-slot:icon>

                            {{ __('Enable') }}
                        </x-button>
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
                            <x-button variant="gradient" color="primary" shadow="glow" type="button" class="me-3" wire:loading.attr="disabled">
                                {{ __('Confirm') }}
                            </x-button>
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
        <p class="pt-4 pb-1 text-sm font-medium leading-normal text-stone-900">
            @if ($this->enabled)
                @if ($showingConfirmation)
                    <x-badge class='px-4 py-1.5' color='yellow' variant='soft' icon="alert-triangle">
                        {{ __('Finish enabling two factor authentication.') }}
                    </x-badge>
                @else
                    <x-badge class='px-4 py-1.5' color='green' variant='soft' icon='circle-check'>

                        {{ __('You have enabled two factor authentication.') }}
                    </x-badge>
                @endif
            @else
                <x-badge class='px-4 py-1.5' color='red' variant='soft' icon="alert-circle">
                    {{ __('You have not enabled two factor authentication.') }}
                </x-badge>
            @endif
        </p>
        <p class="pt-3 pb-2 text-sm leading-normal text-justify text-stone-800">
            {!! __('two_factor_info') !!}
        </p>

        <div class="flex flex-wrap mt-5">
            @if ($this->enabled)
                @if ($showingQrCode)
                    <div class="w-full max-w-full px-3 shrink-0 md:w-7/12 md:flex-0">
                        <p class="text-sm text-stone-800">
                            @if ($showingConfirmation)
                            {{ __('To finish enabling two factor authentication, scan the following QR code using your phone\'s authenticator application or enter the setup key and provide the generated OTP code.') }}
                            @else
                                {{ __('Two factor authentication is now enabled. Scan the following QR code using your phone\'s authenticator application or enter the setup key.') }}
                            @endif
                        </p>

                        <p class="mt-2 mb-3 text-sm text-stone-800">
                            {{ __('Or enter the code below into the authenticator app') }}
                        </p>

                        <div class="flex items-center gap-2 mb-4" x-data>
                            <span x-ref="code" class="block px-8 py-2 text-sm font-semibold rounded-md select-all text-stone-900 bg-stone-100">
                                {{ decrypt($this->user->two_factor_secret) }}
                            </span>

                            <button type="button" @click="$store.clipboard.copy($refs.code.innerText, $refs.tooltip)" class="relative p-2 transition text-stone-700 hover:text-indigo-600">
                                <!-- Copy Icon -->
                                <svg xmlns="http://www.w3.org/2000/svg" class='w-5 h-5' viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <path d="M7 7m0 2.667a2.667 2.667 0 0 1 2.667 -2.667h8.666a2.667 2.667 0 0 1 2.667 2.667v8.666a2.667 2.667 0 0 1 -2.667 2.667h-8.666a2.667 2.667 0 0 1 -2.667 -2.667z" />
                                    <path d="M4.012 16.737a2.005 2.005 0 0 1 -1.012 -1.737v-10c0 -1.1 .9 -2 2 -2h10c.75 0 1.158 .385 1.5 1" />
                                </svg>

                                <!-- Tooltip -->
                                <div x-ref="tooltip" class="absolute hidden px-2.5 py-1.5 text-xs text-white -translate-x-1/2 rounded shadow-lg bg-stone-800 -bottom-7 left-1/2">
                                    <div class='flex items-center gap-2'>
                                        <span>
                                            {{ __('Copied!') }}
                                        </span>
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-3 h-3 text-green-600">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                            <path d="M5 12l5 5l10 -10" />
                                        </svg>
                                    </div>
                                </div>
                            </button>
                        </div>

                        @if ($showingConfirmation)
                            <!-- Code -->
                            <div class="w-full max-w-full px-3 shrink-0 md:w-full md:flex-0">
                                <div class="mb-4">
                                    <x-label for="code" value="{{ __('Code') }}" />
                                    <x-input id="code" type="text" name="code" class="block w-full mt-[1px]" inputmode="numeric"
                                        autofocus autocomplete="one-time-code" wire:model="code"
                                        wire:keydown.enter="confirmTwoFactorAuthentication" />
                                    <x-input-error for="code" class="mt-2" />
                                </div>
                            </div>
                        @endif
                    </div>

                    <div class="w-full max-w-full px-8 text-sm shrink-0 md:w-5/12 md:flex-0 text-stone-950">
                        <div class='items-center justify-center py-[18px] mt-3 border-[3px] border-dashed rounded-lg bg-stone-100 border-stone-200 ps-[18px]'>
                            {!! $this->user->twoFactorQrCodeSvg() !!}
                        </div>
                    </div>
                @endif
                @if ($showingRecoveryCodes)
                    <div class='relative' x-data>
                        <div class="w-full max-w-full px-3 shrink-0 md:w-full md:flex-0">
                            <p class="text-sm font-medium text-stone-950">
                                {{ __('Store these recovery codes in a secure password manager. They can be used to recover access to your account if your two factor authentication device is lost.') }}
                            </p>
                        </div>

                        <div class="relative w-full max-w-full px-4 py-3 mt-3 text-sm rounded-lg shrink-0 md:w-full md:flex-0 bg-stone-100 text-stone-950"
                            x-ref="codes">
                            @foreach (json_decode(decrypt($this->user->two_factor_recovery_codes), true) as $code)
                                <div>{{ $code }}</div>
                            @endforeach
                        </div>

                        <button
                            @click="$store.clipboard.copy(
                                Array.from($refs.codes.querySelectorAll('div')).map(el => el.innerText).join('\n'),
                                $refs.tooltip
                            )"
                            class="absolute items-center px-10 py-1 text-xs font-medium text-white bg-indigo-600 rounded-xl bottom-2 right-3 hover:bg-indigo-700"
                        >
                            Copiar códigos
                        </button>

                        <div
                            x-ref="tooltip"
                            class="hidden mt-1 text-xs font-semibold text-green-600"
                        >
                            ¡Copiados con éxito!
                        </div>
                    </div>
                @endif
            @endif
        </div>
    </div>
</div>

<script>
    document.addEventListener('alpine:init', () => {
        Alpine.store('clipboard', {
            copy(text, tooltipEl) {
                const showTooltip = () => {
                    if (!tooltipEl) return

                    tooltipEl.classList.remove('hidden')
                    setTimeout(() => tooltipEl.classList.add('hidden'), 1200)
                }

                if (navigator.clipboard && window.isSecureContext) {
                    navigator.clipboard.writeText(text).then(showTooltip)
                } else {
                    const textarea = document.createElement('textarea')
                    textarea.value = text
                    textarea.style.position = 'fixed'
                    textarea.style.opacity = '0'
                    document.body.appendChild(textarea)
                    textarea.select()

                    try {
                        document.execCommand('copy')
                        showTooltip()
                    } finally {
                        textarea.remove()
                    }
                }
            }
        })
    })
</script>
