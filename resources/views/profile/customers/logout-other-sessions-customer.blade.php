<div class='bg-[#fefefe] p-8 border-gray-200 border-[1px] border-solid rounded-3xl shadow-sm relative transition-all duration-700 ease-in-out'>
    <h3 class='mx-0 mt-0 mb-5 text-base font-bold tracking-wider ps-1.5 uppercase underline'>
        {{ __('Browser Sessions') }}
    </h3>
    <div class='px-1.5'>
        <p class="text-sm leading-normal text-stone-700">
            {{ __('Manage and log out your active sessions on other browsers and devices.') }}
        </p>
        <p class="pt-3 pb-2 text-sm leading-normal text-justify text-stone-800">
            {{ __('If necessary, you may log out of all of your other browser sessions across all of your devices. Some of your recent sessions are listed below; however, this list may not be exhaustive. If you feel your account has been compromised, you should also update your password.') }}
        </p>
        <div class="flex flex-wrap mt-3">
            @if (count($this->sessions) > 0)
                <div class="mt-5 space-y-6">
                    @foreach ($this->sessions as $session)
                        <div class="flex items-center">
                            <div>
                                {{-- Si es escritorio --}}
                                @if ($session->agent->isDesktop())
                                    {{-- Si ES el dispositivo actual --}}
                                    @if ($session->is_current_device)
                                        {{-- Ícono de escritorio activo --}}
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="text-stone-700 size-8">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                            <path d="M3 4a1 1 0 0 1 1 -1h16a1 1 0 0 1 1 1v12a1 1 0 0 1 -1 1h-16a1 1 0 0 1 -1 -1v-12z" />
                                            <path d="M3 13h18" />
                                            <path d="M8 21h8" />
                                            <path d="M10 17l-.5 4" />
                                            <path d="M14 17l.5 4" />
                                        </svg>
                                    @else
                                        {{-- Ícono de escritorio desconectado --}}
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor"
                                            class="text-stone-400 size-8">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                            <path d="M7 3h13a1 1 0 0 1 1 1v12c0 .28 -.115 .532 -.3 .713m-3.7 .287h-13a1 1 0 0 1 -1 -1v-12c0 -.276 .112 -.526 .293 -.707" />
                                            <path d="M3 13h10m4 0h4" />
                                            <path d="M8 21h8" />
                                            <path d="M10 17l-.5 4" />
                                            <path d="M14 17l.5 4" />
                                            <path d="M3 3l18 18" />
                                        </svg>
                                    @endif
                                @else
                                    {{-- Si es un móvil --}}
                                    @if ($session->is_current_device)
                                        {{-- Ícono de móvil activo --}}
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="text-stone-700 size-8">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                            <path d="M6 5a2 2 0 0 1 2 -2h8a2 2 0 0 1 2 2v14a2 2 0 0 1 -2 2h-8a2 2 0 0 1 -2 -2v-14z" />
                                            <path d="M11 4h2" />
                                            <path d="M12 17v.01" />
                                        </svg>
                                    @else
                                        {{-- Ícono de móvil desconectado --}}
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor"
                                            class="text-stone-400 size-8">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                            <path d="M7.159 3.185c.256 -.119 .54 -.185 .841 -.185h8a2 2 0 0 1 2 2v9m0 4v1a2 2 0 0 1 -2 2h-8a2 2 0 0 1 -2 -2v-13" />
                                            <path d="M11 4h2" />
                                            <path d="M3 3l18 18" />
                                            <path d="M12 17v.01" />
                                        </svg>
                                    @endif
                                @endif
                            </div>

                            <div class="ms-3">
                                <div class="text-sm font-bold {{ $session->is_current_device ? 'text-stone-600' : 'text-stone-500' }}">
                                    {{ $session->agent->platform() ? $session->agent->platform() : __('Unknown') }} -
                                    {{ $session->agent->browser() ? $session->agent->browser() : __('Unknown') }}
                                </div>

                                <div>
                                    <div class="text-xs {{ $session->is_current_device ? 'text-stone-500' : 'text-stone-400' }}">
                                        {{ $session->ip_address }},

                                        @if ($session->is_current_device)
                                            <span class="font-semibold text-green-500">{{ __('This device') }}</span>
                                        @else
                                            <span class="font-semibold text-[#b6b6b6]">
                                                {{ __('Last active') }} {{ $session->last_active }}
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
        <div class='flex items-center mt-3 font-bold ms-auto'>
            <x-button variant="gradient" color="dark" shadow="md" class='inline-block' wire:click="confirmLogout" wire:loading.attr="disabled">
                {{ __('Log Out Other Browser Sessions') }}
            </x-button>
            <x-secondary-button class="hidden ms-3" on="loggedOut">
                {{ __('Done.') }}
            </x-secondary-button>
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
