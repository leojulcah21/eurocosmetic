@props(['class' => ''])
<div x-data="{ sidebarOpen: false }">
    <button class="fixed z-20 p-2 text-stone-900 top-[18px] right-4 rounded-xl sm:inline-block xl:hidden"
        @click="sidebarOpen = !sidebarOpen">
        <x-icon name="menu" class="w-6 h-6" x-show="!sidebarOpen" />
        <x-icon name="close-menu" class="w-6 h-6" x-show="sidebarOpen" />
    </button>
    <aside
        class="fixed inset-y-0 flex-wrap items-center justify-between block w-full p-0 my-4 overflow-y-auto antialiased text-white transition-transform -translate-x-full border-0 shadow-xl duration-800 bg-stone-950 {{ $class }}"
        :class="{'-translate-x-full': !sidebarOpen, 'translate-x-0 ml-6': sidebarOpen}">
        <div class="h-[76px]">
            <a href="{{ route('dashboard') }}" class='block px-8 py-6 m-0 text-sm text-white whitespace-nowrap'>
                <x-dashboard-logo class="w-40 m-auto text-white" />
            </a>
        </div>
        <div class="h-px mt-0 bg-transparent bg-gradient-to-r from-transparent via-white to-transparent">
        </div>
        <div class="items-center block w-auto max-h-screen overflow-auto h-[calc(100vh-360px)] grow basis-full mt-2">
            <ul class="flex flex-col pl-0 mb-0">
                <li class="mt-0.5 w-full">
                    <x-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                        <div
                            class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                            <x-icons.dashboard :active="request()->routeIs('dashboard')" />
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">
                            {{ __('Dashboard') }}
                        </span>
                    </x-nav-link>
                </li>
                <li class="w-full mt-4 mb-2">
                    <h6 class="pl-6 ml-2 text-[9px] font-bold leading-tight uppercase dark:text-white opacity-60">
                        Account
                        pages
                    </h6>
                </li>
                <li class="mt-0.5 w-full">
                    <x-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                        <div
                            class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                            <x-icons.profile :active="request()->routeIs('profile.show')" />
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">
                            {{ __('Profile') }}
                        </span>
                    </x-nav-link>
                </li>
                <li class="w-full mt-1">
                    <form method="POST" action="{{ route('logout') }}" x-data>
                        @csrf

                        <x-nav-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                            <div
                                class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                                <x-icons.logout  :active="request()->routeIs('logout')" variant='danger' />
                            </div>
                            <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">
                                {{ __('Log Out') }}
                            </span>
                        </x-nav-link>
                    </form>
                </li>
            </ul>
        </div>
    </aside>
</div>
