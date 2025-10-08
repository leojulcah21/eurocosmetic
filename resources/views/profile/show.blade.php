<x-app-layout>
    <x-slot name="header">
        <h6 class="mb-0 text-xl font-[550] capitalize text-stone-950">
            {{ __('Profile') }}
        </h6>
    </x-slot>
    <x-profile-card>
        <div class='w-full max-w-full px-3 shrink-0 md:w-8/12 md:flex-0'>
            <div
                class='relative flex flex-col min-w-0 break-words bg-white border-0 shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border'>
                @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                @livewire('profile.update-profile-information-form')

                @endif

                @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                <div class="mt-10 sm:mt-0">
                    @livewire('profile.update-password-form')
                </div>
                @endif
            </div>
        </div>
        <div class="w-full max-w-full px-3 mt-6 shrink-0 md:w-4/12 md:flex-0 md:mt-0">
            <div
                class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                <img class="w-full rounded-t-2xl" src="{{ asset('img/bg-profile.jpg') }}" alt="profile cover image">
                <div class="flex flex-wrap justify-center -mx-3">
                    <div class="w-4/12 max-w-full px-3 flex-0 ">
                        <div class="mb-6 -mt-6 lg:mb-0 lg:-mt-16">
                            <a href="#">
                                <img class="h-auto max-w-full border-2 border-white border-solid rounded-full"
                                    src="{{ asset('img/user.png') }}" alt="profile image">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="border-black/12.5 rounded-t-2xl p-6 text-center pt-0 pb-6 lg:pt-2 lg:pb-4">
                    <div class="flex justify-between">
                        <button type="button"
                            class="hidden px-8 py-2 text-xs font-bold leading-normal text-center text-white uppercase align-middle transition-all ease-in border-0 rounded-lg shadow-md cursor-pointer bg-cyan-500 lg:block tracking-tight-rem hover:shadow-xs hover:-translate-y-px active:opacity-85">{{ __('Select A New Photo') }}</button>
                        <button type="button"
                            class="block px-8 py-2 text-xs font-bold leading-normal text-center text-white align-middle transition-all ease-in border-0 rounded-lg shadow-md cursor-pointer bg-cyan-500 lg:hidden tracking-tight-rem hover:shadow-xs hover:-translate-y-px active:opacity-85">
                            <x-icon name='camera-plus' class="text-2.8" />
                        </button>
                        <button type="button"
                            class="hidden px-8 py-2 text-xs font-bold leading-normal text-center text-white uppercase align-middle transition-all ease-in border-0 rounded-lg shadow-md cursor-pointer bg-slate-700 lg:block tracking-tight-rem hover:shadow-xs hover:-translate-y-px active:opacity-85">{{ __('Remove Photo') }}</button>
                        <button type="button"
                            class="block px-8 py-2 text-xs font-bold leading-normal text-center text-white align-middle transition-all ease-in border-0 rounded-lg shadow-md cursor-pointer bg-slate-700 lg:hidden tracking-tight-rem hover:shadow-xs hover:-translate-y-px active:opacity-85">
                            <x-icon name='camera-x' class="text-2.8" />
                        </button>
                    </div>
                </div>

                <div class="flex-auto p-6 pt-0 mb-3">
                    <div class="text-center t-6 ">
                        <h5 class="text-[22px] font-medium text-stone-700">
                            {{ Auth::user()->name }}
                            <span class="font-light">, 22</span>
                        </h5>
                        <div class="relative mb-2 text-base font-semibold leading-relaxed text-stone-700">
                            <x-icon name='mailbox' class="absolute w-[18px] h-[18px] mr-2 left-[100px] top-[2.2px]" />
                            {{ Auth::user()->email }}
                        </div>
                        <div
                            class="relative mt-5 mb-2 text-base font-semibold leading-relaxed text-stone-700">
                            <x-icon name='user-star' class="absolute w-[18px] h-[18px] mr-2 left-[84px] top-[2.2px]" />
                            Manager - Administrative Area
                        </div>
                        <div class="relative text-stone-600">
                            <x-icon name='building-skyscraper' class="absolute w-[18px] h-[18px] mr-2 left-[102px] top-[3.5px] text-stone-600" />
                            {{ __('Corporation') }} Eurocosmetic
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-profile-card>
</x-app-layout>
