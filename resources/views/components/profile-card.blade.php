<div class="relative w-full mx-auto mt-6">
    <div
        class='relative flex flex-col flex-auto min-w-0 p-4 mx-6 overflow-hidden break-words bg-white border-0 shadow-lg rounded-2xl bg-clip-border'>
        <div class="flex flex-wrap px-1.5 -mx-3">
            <div class="flex-none w-auto max-w-full px-3">
                <div
                    class="relative inline-flex items-center justify-center w-[76px] h-[76px] text-base text-white transition-all duration-200 ease-in-out rounded-xl">
                    <img src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}"
                        class="object-cover w-full h-full shadow-2xl rounded-xl" />
                </div>
            </div>
            <div class="flex-none w-auto max-w-full px-3 my-auto">
                <div class="h-full">
                    <h5 class="mb-1 text-lg font-medium text-stone-950">{{ Auth::user()->name }}</h5>
                    <p class="mb-0 text-sm font-semibold leading-normal text-stone-950 ps-0.5">{{ Auth::user()->email }}
                    </p>
                </div>
            </div>
            <div class="w-full max-w-full px-3 mx-auto mt-4 sm:my-auto sm:mr-0 md:w-1/2 md:flex-none lg:w-4/12">
                <div class="relative right-0">
                    <ul id="profile-tabs" class="relative flex flex-wrap py-1 px-0.5 list-none rounded-lg bg-stone-50">
                        <!-- Highlight dinámico -->
                        <li
                            class="absolute z-0 transition-all duration-500 ease-in-out bg-white rounded-lg shadow-sm moving-tab">
                        </li>

                        <!-- Tabs -->
                        <li class="z-10 flex-auto text-center cursor-pointer">
                            <a href="#" data-tab="app"
                                class="flex items-center justify-center w-full px-0 py-1 mb-0 text-sm rounded-lg tab-link">
                                <x-icon name="cards" class="w-5 h-5" />
                                <span class="ml-2">{{ __('Data') }}</span>
                            </a>
                        </li>
                        <li class="z-10 flex-auto text-center cursor-pointer">
                            <a href="#" data-tab="messages"
                                class="flex items-center justify-center w-full px-0 py-1 mb-0 text-sm rounded-lg tab-link">
                                <x-icon name="devices" class="w-5 h-5" />
                                <span class="ml-2">{{ __('Sessions') }}</span>
                            </a>
                        </li>
                        <li class="z-10 flex-auto text-center cursor-pointer">
                            <a href="#" data-tab="settings"
                                class="flex items-center justify-center w-full px-0 py-1 mb-0 text-sm rounded-lg tab-link">
                                <x-icon name="settings" class="w-5 h-5" />
                                <span class="ml-2">{{ __('Settings') }}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="w-full p-6 mx-auto">
    {{ $slot }}
</div>
