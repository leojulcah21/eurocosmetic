<x-app-layout>
    <x-slot name="header">
        <h6 class="mb-0 text-[17px] font-[600] capitalize text-stone-950 tracking-wider">
            {{ __('Employees') }}
        </h6>
    </x-slot>
    <x-app.data-section class="px-8 bg-white shadow-xl" :title="__('Employee Management')">
        <form method="POST" action="{{ route('company.employees.sellers.store') }}">
            @csrf
            <div class='flex flex-wrap -mx-3'>
                <div class="w-full max-w-full px-5 shrink-0 flex-[0_0_auto]">
                    <div class="relative flex flex-col min-w-0 px-2 pt-1 break-words bg-clip-border">
                        <div class="pt-6 px-6 pb-0 border-b-0 border-solid border-[rgb(0_0_0/0.125)] rounded-t-2xl">
                            <div class="flex items-center justify-between">
                                <p class="mb-0 -mt-5 text-lg font-bold text-stone-800">{{ __('Create Seller') }}</p>
                                <div class='flex items-center font-bold ms-auto'>
                                    <x-primary-button wire:loading.attr="disabled" wire:target="photoCard"
                                        class='inline-block mr-3'>
                                        <x-slot:icon>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 mr-2 mb-0.5"
                                                viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="icon icon-tabler icons-tabler-outline icon-tabler-device-floppy">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path
                                                    d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2" />
                                                <path d="M12 14m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                                <path d="M14 4l0 4l-6 0l0 -4" />
                                            </svg>
                                        </x-slot:icon>

                                        {{ __('Save') }}
                                    </x-primary-button>

                                    <x-secondary-link href="{{ route('company.employees.sellers.index') }}">
                                        <x-slot:icon>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 mr-2 mb-0.5"
                                                viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-back">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M9 11l-4 4l4 4m-4 -4h11a4 4 0 0 0 0 -8h-1" />
                                            </svg>
                                        </x-slot:icon>

                                        Volver
                                    </x-secondary-link>
                                </div>
                            </div>
                        </div>
                        <div class='flex-auto px-6 pt-3 pb-6'>
                            <p class="font-bold leading-normal uppercase text-[13px] text-stone-700 underline">
                                {{ __('Profile Information')}}
                            </p>
                            <div class="flex flex-wrap mt-3 -mx-3">
                                <div class="w-full max-w-full px-3 shrink-0 md:w-3/12 md:flex-0">
                                    <div class="mb-4">
                                        <x-label for="code" value="{{ __('Code') }}" />
                                        <x-input id="code" name="code" type="text" class="block w-full mt-[1px]"
                                            required autocomplete="email" value="{{ $newCode ?? '' }}" readonly />
                                        <x-input-error for="code" class="mt-2" />
                                    </div>
                                </div>
                                <div class="w-full max-w-full px-3 shrink-0 md:w-9/12 md:flex-0">
                                    <div class="mb-4">
                                        <x-label for="email" value="{{ __('Email') }}" />
                                        <x-input id="email" name="email" type="email" class="block w-full mt-[1px]"
                                            required autocomplete="email" placeholder='Type a email address' />
                                        <x-input-error for="email" class="mt-2" />
                                    </div>
                                </div>
                                <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                                    <div class="mb-4">
                                        <x-label for="name" value="{{ __('Name') }}" />
                                        <x-input name="name" id="name" type="text" class="block w-full mt-[1px]"
                                            required autocomplete="name" placeholder="{{ __('Create a name') }}" />
                                        <x-input-error for="name" class="mt-2" />
                                    </div>
                                </div>
                                <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                                    <div class="mb-4">
                                        <x-label for="username" value="{{ __('Username') }}" />
                                        <x-input name="username" type="text" class="block w-full mt-[1px]" required
                                            autocomplete="username" placeholder="{{ __('Create a username') }}" />
                                        <x-input-error for="username" class="mt-2" />
                                    </div>
                                </div>
                                <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                                    <div class="mb-4">
                                        <x-label for="password" value="{{ __('Password') }}" />
                                        <x-input name="password" placeholder="Contraseña" type="password"
                                            class="block w-full mt-[1px]" required />
                                        <x-input-error for="password" class="mt-2" />
                                    </div>
                                </div>
                                <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                                    <div class="mb-4">
                                        <x-label for="password_confirmation" value="{{ __('Password') }}" />
                                        <x-input name="password_confirmation" placeholder="Confirmar contraseña"
                                            type="password" class="block w-full mt-[1px]" required />
                                        <x-input-error for="password_confirmation" class="mt-2" />
                                    </div>
                                </div>
                            </div>

                            <p class="font-bold leading-normal uppercase text-[13px] text-stone-700 underline mt-3">
                                {{ __('Personal Data')}}
                            </p>
                            <div class="flex flex-wrap mt-3 -mx-3">
                                <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                                    <div class="mb-4">
                                        <x-label for="dni" value="{{ __('DNI') }}" />
                                        <x-input name="dni" placeholder="{{ __('Type a DNI number') }}" />
                                        <x-input-error for="dni" class="mt-2" />
                                    </div>
                                </div>

                                <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                                    <div class="mb-4">
                                        <x-label for="phone" value="{{ __('Phonenumber') }}" />
                                        <x-input name="phone" placeholder="Type a phonenumber" />
                                        <x-input-error for="phone" class="mt-2" />
                                    </div>
                                </div>

                                <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                                    <div class="mb-4">
                                        <x-label for="birth_date" value="{{ __('Birthdate') }}" />
                                        <x-input name="birth_date" placeholder="Type a birthdate" type="date" />
                                        <x-input-error for="birth_date" class="mt-2" />
                                    </div>
                                </div>

                                <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                                    <div class="mb-4">
                                        <x-label for="years_experience" value="{{ __('Years experiencie') }}" />
                                        <x-input name="years_experience" placeholder="Type a years experiencie"
                                            type="number" />
                                        <x-input-error for="years_experience" class="mt-2" />
                                    </div>
                                </div>
                            </div>

                            <p class="font-bold leading-normal uppercase text-[13px] text-stone-700 underline mt-3">
                                {{ __('Seller Information')}}
                            </p>
                            <div class="flex flex-wrap mt-3 -mx-3">
                                <div class="w-full max-w-full px-3 pt-3.5 shrink-0 md:w-3/12 md:flex-0">
                                    <div class="mb-4">
                                        <x-label for="line" value="{{ __('Selling line') }}" />
                                        <x-input name="line" placeholder="Type a selling line" />
                                        <x-input-error for="line" class="mt-2" />
                                    </div>
                                </div>

                                <div class="w-full max-w-full px-3 shrink-0 md:w-9/12 md:flex-0">
                                    <div class="mb-4">
                                        <x-label for="notes" value="{{ __('Notes') }}" />
                                        <x-textarea name="notes" />
                                        <x-input-error for="notes" class="mt-2" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </x-app.data-section>
</x-app-layout>
