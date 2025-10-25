@php
    $groups = [
        'Company' => [
            [
                'name' => 'Dashboard',
                'icon' => 'dashboard',
                'url' => route('company.dashboard'),
                'active' => request()->routeIs('company.dashboard'),
            ],
            [
                'name' => 'Employees',
                'icon' => 'employee',
                'url' => route('company.employees.index'),
                'dropdown' => true,
                'open' =>
                    request()->routeIs('company.employees.sellers.*') ||
                    request()->routeIs('company.employees.whs-managers.*'),
                'children' => [
                    [
                        'name' => 'Sellers',
                        'url' => route('company.employees.sellers.index'),
                        'active' => request()->routeIs('company.employees.sellers.*'),
                    ],
                    [
                        'name' => 'Warehouse Managers',
                        'url' => route('company.employees.whs-managers.index'),
                        'active' => request()->routeIs('company.employees.whs-managers.*'),
                    ],
                ],
                'active' => request()->routeIs('company.employees.index'),
            ],
            [
                'name' => 'Inventario',
                'icon' => 'inventory',
                'url' => route('company.inventory.index'),
                'dropdown' => true,
                'open' =>
                    request()->routeIs('company.inventory.products.*') ||
                    request()->routeIs('company.inventory.categories.*') ||
                    request()->routeIs('company.inventory.warehouses.*'),
                'children' => [
                    [
                        'name' => 'Almacenes',
                        'url' => route('company.inventory.warehouses.index'),
                        'active' => request()->routeIs('company.inventory.warehouses.*'),
                    ],
                    [
                        'name' => 'Categorías',
                        'url' => route('company.inventory.categories.index'),
                        'active' => request()->routeIs('company.inventory.categories.*'),
                    ],
                    [
                        'name' => 'Productos',
                        'url' => route('company.inventory.products.index'),
                        'active' => request()->routeIs('company.inventory.products.*'),
                    ],
                ],
                'active' => request()->routeIs('company.inventory.index'),
            ],
        ],
    ];
@endphp
@props(['class' => ''])
<div x-data="{ sidebarOpen: false }">
    <button class="fixed p-2 z-40 text-stone-900 top-[18px] right-4 rounded-xl sm:inline-block xl:hidden"
        @click="sidebarOpen = !sidebarOpen">
        <x-icon name="menu" class="w-6 h-6" x-show="!sidebarOpen" />
        <x-icon name="close-menu" class="w-6 h-6" x-show="sidebarOpen" />
    </button>
    <aside
        class="fixed inset-y-0 flex-wrap items-center justify-between block w-full p-0 my-4 overflow-y-auto antialiased text-white transition-transform -translate-x-full border-0 z-30 shadow-xl duration-800 bg-stone-950 {{ $class }}"
        :class="{'-translate-x-full': !sidebarOpen, 'translate-x-0 ml-6 relative': sidebarOpen}">
        <div class="h-[76px]">
            <a href="{{ route('company.dashboard') }}" class='block px-8 py-6 m-0 text-sm text-white whitespace-nowrap'>
                <x-dashboard-logo class="w-40 m-auto text-white" />
            </a>
        </div>
        <div class="h-px mt-0 bg-transparent bg-gradient-to-r from-transparent via-white to-transparent">
        </div>
        <div class="items-center block w-auto max-h-screen overflow-auto h-[calc(100vh-360px)] grow basis-full mt-2">
            <ul class="flex flex-col pl-0 mb-0">
                @foreach ($groups as $groupName => $items)
                    <li class="w-full mt-2 mb-2">
                        <h6 class="pl-6 ml-2 text-[9px] font-bold leading-tight uppercase opacity-60">
                            {{ $groupName }}
                        </h6>
                    </li>

                    @foreach ($items as $item)
                        {{-- Verificamos si es dropdown --}}
                        @if (!empty($item['dropdown']) && $item['dropdown'] === true)
                            <li class="mt-0.5 w-full"
                                x-data="{ open: {{ $item['open'] ? 'true' : 'false' }} }">

                                <x-nav-link @click="open = !open" :active="$item['active']">
                                    <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                                        <x-dynamic-component :component="'icons.' . $item['icon']" />
                                    </div>
                                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">{{ __($item['name']) }}</span>
                                    <span class='absolute right-5'>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-2 h-2 transition-transform duration-300"
                                        :class="{'rotate-180': open}" fill="none" viewBox="0 0 10 6">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="m1 1 4 4 4-4" />
                                        </svg>
                                    </span>
                                </x-nav-link>

                                <ul x-show="open" x-transition.duration.200ms
                                    class="py-2 pr-4 space-y-1 overflow-hidden text-sm pl-14">
                                    @foreach ($item['children'] as $child)
                                        <li>
                                            <x-nav-link href="{{ $child['url'] }}" :active="$child['active']">
                                                {{ __($child['name']) }}
                                            </x-nav-link>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        @else
                            {{-- Enlace normal --}}
                            <li class="mt-0.5 w-full">
                                <x-nav-link href="{{ $item['url'] }}" :active="$item['active']">
                                    <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                                        <x-dynamic-component :component="'icons.' . $item['icon']" :active="$item['active']" />
                                    </div>
                                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">
                                        {{ __($item['name']) }}
                                    </span>
                                </x-nav-link>
                            </li>
                        @endif
                    @endforeach
                @endforeach
                <li class="w-full mt-4 mb-2">
                    <h6 class="pl-6 ml-2 text-[9px] font-bold leading-tight uppercase dark:text-white opacity-60">
                        {{ __('Account pages') }}
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
                                <x-icons.logout :active="request()->routeIs('logout')" variant='danger' />
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
