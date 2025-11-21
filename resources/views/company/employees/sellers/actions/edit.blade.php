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
                                            class="block w-full mt-[1px]" value="{{ $seller->employee->years_experience }}" />
                                        <x-input-error for="years_experience" class="mt-2" />
                                    </div>
                                </div>
                            </div>

                            <p class="font-bold leading-normal uppercase text-[13px] text-stone-700 underline mt-3">
                                {{ __('Seller Information') }}
                            </p>

                            <div class="flex flex-wrap mt-3 -mx-3">
                                <!-- LINE -->
                                <div class="w-full max-w-full px-3 pt-3.5 shrink-0 md:w-10/12 md:flex-0">
                                    <div class="mb-4">
                                        <x-label for="line" value="{{ __('Selling line') }}" />
                                        <x-input id="line" name="line" class="block w-full mt-[1px]"
                                            value="{{ $seller->line }}" />
                                        <x-input-error for="line" class="mt-2" />
                                    </div>
                                </div>
                                <div x-data="{ open: false, status: '{{ $seller->employee->status ?? 'inactive' }}' }" class="relative w-full max-w-full px-3 pt-3.5 shrink-0 md:w-2/12 md:flex-0">
                                    <div class="mb-4">
                                        <x-label for="line" value="{{ __('Status') }}" />
                                        <input type="hidden" name="status" x-model="status">
                                        <button
                                            @click="open = !open"
                                            type="button"
                                            class="flex items-center w-full px-4 pr-12 py-2 bg-[#f5f5f5] rounded-md border border-solid border-stone-200 text-sm text-[#333] placeholder-[#888] placeholder:font-normal focus:outline-none focus:ring-0 focus:border-stone-200 shadow-sm"
                                        >
                                            <span class="sr-only">Open user menu</span>

                                            <!-- Tu SVG personalizado -->
                                            <div class="flex items-center justify-center w-5 h-5 rounded-full me-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-8 h-8">
                                                    <path d="M23,11h-2.152c-.174,0-.339-.093-.429-.242l-1.406-2.336c-.898-1.494-2.54-2.421-4.283-2.421h-3.802c-.954,0-1.811,.53-2.236,1.382l-1.585,3.171c-.247,.494-.047,1.095,.447,1.342,.495,.248,1.095,.046,1.342-.447l1.585-3.171c.085-.170,.256-.276,.447-.276h1.602l-1.753,4.273c-.553,1.350-.060,2.895,1.167,3.670l3.827,2.456c.144,.092,.229,.249,.229,.420v4.180c0,.552,.447,1,1,1s1-.448,1-1v-4.18c0-.856-.431-1.643-1.15-2.104l-1.332-.855,2.268-5.6,.92,1.529c.449,.747,1.271,1.21,2.142,1.21h2.152c.553,0,1-.448,1-1s-.447-1-1-1Zm-9.982,3.257c-.411-.260-.575-.775-.391-1.225l2.064-5.032h.039c.570,0,1.113,.177,1.585,.472l-2.514,6.287-.782-.502Zm1.482-11.757c0-1.381,1.119-2.5,2.5-2.5s2.5,1.119,2.5,2.5-1.119,2.5-2.5,2.5-2.5-1.119-2.5-2.5ZM2,3c0-.552,.448-1,1-1h7c.552,0,1,.448,1,1s-.448,1-1,1H3c-.552,0-1-.448-1-1Zm2,9H1c-.552,0-1-.448-1-1s.448-1,1-1h3c.552,0,1,.448,1,1s-.448,1-1,1ZM1,7c0-.552,.448-1,1-1H6c.552,0,1,.448,1,1s-.448,1-1,1H2c-.552,0-1-.448-1-1Zm10.395,11.447c-.289,.577-1.117,1.553-2.395,1.553H5c-.552,0-1-.448-1-1s.448-1,1-1h4c.354,0,.609-.455,.612-.459,.259-.481,.86-.671,1.345-.421,.485,.251,.682,.839,.438,1.328Z"/>
                                                </svg>
                                            </div>

                                            <span x-text="status" class="capitalize"></span>

                                            <svg class="w-4 h-4 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7"/>
                                            </svg>
                                        </button>
                                            <!-- Dropdown -->
                                        <div
                                            x-show="open"
                                            @click.away="open = false"
                                            class="absolute z-10 pt-2 mt-2 bg-white border rounded-lg shadow-lg w-72"
                                        >
                                            <ul class="px-2 pb-2 text-sm font-medium text-body">

                                                <!-- ACTIVE -->
                                                <li>
                                                    <button
                                                        @click="status = 'active'; open = false"
                                                        :class="status === 'active' ? 'bg-stone-100 text-heading' : ''"
                                                        type="button"
                                                        class="inline-flex items-center w-full p-2 capitalize rounded hover:bg-stone-100"
                                                    >
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 me-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                            <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                                                            <path d="M6 21v-2a4 4 0 0 1 4 -4h4" />
                                                            <path d="M15 19l2 2l4 -4" />
                                                        </svg>
                                                        active
                                                    </button>
                                                </li>

                                                <!-- INACTIVE -->
                                                <li>
                                                    <button
                                                        @click="status = 'inactive'; open = false"
                                                        :class="status === 'inactive' ? 'bg-stone-100 text-heading' : ''"
                                                        type="button"
                                                        class="inline-flex items-center w-full p-2 capitalize rounded hover:bg-stone-100"
                                                    >
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 me-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                            <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                                                            <path d="M6 21v-2a4 4 0 0 1 4 -4h3.5" />
                                                            <path d="M22 22l-5 -5" />
                                                            <path d="M17 22l5 -5" />
                                                        </svg>
                                                        inactive
                                                    </button>
                                                </li>

                                                <!-- RESIGNED -->
                                                <li>
                                                    <button
                                                        @click="status = 'resigned'; open = false"
                                                        :class="status === 'resigned' ? 'bg-stone-100 text-heading' : ''"
                                                        type="button"
                                                        class="inline-flex items-center w-full p-2 capitalize rounded hover:bg-stone-100"
                                                    >
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 me-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                            <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                                                            <path d="M6 21v-2a4 4 0 0 1 4 -4h4c.342 0 .674 .043 .99 .124" />
                                                            <path d="M19 16v6" />
                                                            <path d="M22 19l-3 3l-3 -3" />
                                                        </svg>
                                                        resigned
                                                    </button>
                                                </li>

                                            </ul>
                                        </div>
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
