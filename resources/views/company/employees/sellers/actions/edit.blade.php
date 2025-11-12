<x-app-layout>
    <x-slot name="header">
        <h6 class="mb-0 text-[17px] font-[600] capitalize text-stone-950 tracking-wider">
            {{ __('Employees') }}
        </h6>
    </x-slot>

    <x-app.data-section class="px-8 bg-white shadow-xl" :title="__('Employee Management')">
        <form method="POST" action="{{ route('company.employees.sellers.update', $seller) }}">
            @csrf
            @method('PUT')

            <div class='flex flex-wrap -mx-3'>
                <div class="w-full max-w-full px-5 shrink-0 flex-[0_0_auto]">
                    <div class="relative flex flex-col min-w-0 px-2 pt-1 break-words bg-clip-border">
                        <div class="pt-6 px-6 pb-0 border-b-0 border-solid border-[rgb(0_0_0/0.125)] rounded-t-2xl">
                            <div class="flex items-center justify-between">
                                <p class="mb-0 -mt-5 text-lg font-bold text-stone-800">
                                    {{ __('Edit Seller') }}
                                </p>
                                <div class='flex items-center font-bold ms-auto'>
                                    <x-primary-button wire:loading.attr="disabled" wire:target="photoCard"
                                        class='inline-block mr-3'>
                                        <x-slot:icon>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5"
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
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5"
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
                                {{ __('Profile Information') }}
                            </p>

                            <div class="flex flex-wrap mt-3 -mx-3">
                                <!-- CODE -->
                                <div class="w-full max-w-full px-3 shrink-0 md:w-3/12 md:flex-0">
                                    <div class="mb-4">
                                        <x-label for="code" value="{{ __('Code') }}" />
                                        <x-input id="code" name="code" type="text" class="block w-full mt-[1px]"
                                            readonly value="{{ $seller->code }}" />
                                        <x-input-error for="code" class="mt-2" />
                                    </div>
                                </div>

                                <!-- EMAIL -->
                                <div class="w-full max-w-full px-3 shrink-0 md:w-9/12 md:flex-0">
                                    <div class="mb-4">
                                        <x-label for="email" value="{{ __('Email') }}" />
                                        <x-input id="email" name="email" type="email" class="block w-full mt-[1px]"
                                            required value="{{ $seller->employee->email }}" />
                                        <x-input-error for="email" class="mt-2" />
                                    </div>
                                </div>

                                <!-- NAME -->
                                <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                                    <div class="mb-4">
                                        <x-label for="name" value="{{ __('Name') }}" />
                                        <x-input id="name" name="name" type="text" class="block w-full mt-[1px]"
                                            required value="{{ $seller->employee->user->name }}" />
                                        <x-input-error for="name" class="mt-2" />
                                    </div>
                                </div>

                                <!-- USERNAME -->
                                <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                                    <div class="mb-4">
                                        <x-label for="username" value="{{ __('Username') }}" />
                                        <x-input id="username" name="username" type="text" class="block w-full mt-[1px]"
                                            required value="{{ $seller->employee->user->username }}" />
                                        <x-input-error for="username" class="mt-2" />
                                    </div>
                                </div>
                            </div>

                            <p class="font-bold leading-normal uppercase text-[13px] text-stone-700 underline mt-3">
                                {{ __('Personal Data') }}
                            </p>

                            <div class="flex flex-wrap mt-3 -mx-3">
                                <!-- DNI -->
                                <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                                    <div class="mb-4">
                                        <x-label for="dni" value="{{ __('DNI') }}" />
                                        <x-input id="dni" name="dni" class="block w-full mt-[1px]"
                                            value="{{ $seller->employee->dni }}" />
                                        <x-input-error for="dni" class="mt-2" />
                                    </div>
                                </div>

                                <!-- PHONE -->
                                <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                                    <div class="mb-4">
                                        <x-label for="phone" value="{{ __('Phonenumber') }}" />
                                        <x-input id="phone" name="phone" class="block w-full mt-[1px]"
                                            value="{{ $seller->employee->phone }}" />
                                        <x-input-error for="phone" class="mt-2" />
                                    </div>
                                </div>

                                <!-- BIRTHDATE -->
                                <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                                    <div class="relative mb-4">
                                        <div class="absolute flex items-center pointer-events-none inset-y-[52px] end-4 ps-3">
                                            <svg class="w-4 h-4 text-[#888]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                                            </svg>
                                        </div>
                                        <x-label for="birth_date" value="{{ __('Birthdate') }}" />
                                        <x-datepicker name="birth_date" class="block w-full mt-[1px]" value="{{ $seller->employee->birth_date }}" />
                                        <x-input-error for="birth_date" class="mt-2" />
                                    </div>
                                </div>

                                <!-- YEARS EXPERIENCE -->
                                <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                                    <div class="mb-4">
                                        <x-label for="years_experience" value="{{ __('Years experience') }}" />
                                        <x-input id="years_experience" name="years_experience" type="number"
                                            class="block w-full mt-[1px]" value="{{ $seller->years_experience }}" />
                                        <x-input-error for="years_experience" class="mt-2" />
                                    </div>
                                </div>
                            </div>

                            <p class="font-bold leading-normal uppercase text-[13px] text-stone-700 underline mt-3">
                                {{ __('Seller Information') }}
                            </p>

                            <div class="flex flex-wrap mt-3 -mx-3">
                                <!-- LINE -->
                                <div class="w-full max-w-full px-3 pt-3.5 shrink-0 md:w-3/12 md:flex-0">
                                    <div class="mb-4">
                                        <x-label for="line" value="{{ __('Selling line') }}" />
                                        <x-input id="line" name="line" class="block w-full mt-[1px]"
                                            value="{{ $seller->line }}" />
                                        <x-input-error for="line" class="mt-2" />
                                    </div>
                                </div>

                                <!-- NOTES -->
                                <div class="w-full max-w-full px-3 shrink-0 md:w-9/12 md:flex-0">
                                    <div class="mb-4">
                                        <x-label for="notes" value="{{ __('Notes') }}" />
                                        <x-textarea id="notes" name="notes">{{ $seller->notes }}</x-textarea>
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
