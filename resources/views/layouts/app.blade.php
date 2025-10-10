<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="icon" type="image/png" href="{{ asset('img/icono.png') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playwrite+US+Modern:wght@100..400&display=swap"
        rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
</head>

<body class="m-0 font-sans text-base antialiased font-normal bg-[#f8f9fa] leading-[1.6] text-slate-500">
    <div class="absolute w-full bg-red-50 dark:hidden min-h-72"></div>
    <x-app.sidebar class='z-20 max-w-64 xl:ml-6 rounded-2xl xl:left-0 xl:translate-x-0' />
    <main class="relative h-full max-h-screen transition-all duration-200 ease-in-out xl:ml-[17rem] rounded-xl z-10">
        <nav
            class="relative flex flex-wrap items-center justify-between px-0 py-2 ml-6 transition-all ease-in shadow-none xl:mr-2 lg:mr-10 duration-250 rounded-2xl lg:flex-nowrap lg:justify-start md:mr-10">
            <div class="flex items-center justify-between w-full px-4 py-1 mx-auto flex-wrap-inherit">
                <nav>
                    <!-- breadcrumb -->
                    <ol class="flex flex-wrap pt-1 mr-12 bg-transparent rounded-lg sm:mr-16">
                        <li class="text-xs leading-normal">
                            <a class="font-medium opacity-50 text-stone-700" href="#">{{ __('Pages') }}</a>
                        </li>
                        <li
                            class="text-xs pl-2 capitalize leading-normal text-stone-950 before:float-left before:pr-2 before:text-stone-950 before:content-['/']">
                            {{ __('Dashboard') }}</li>
                    </ol>
                    {{ $header }}
                </nav>

                <div class="flex items-center mt-2 grow sm:mt-0 sm:mr-6 md:mr-0 lg:flex lg:basis-auto">
                    <div class="flex items-center md:ml-auto md:pr-4">
                        <div class="relative flex flex-wrap items-stretch w-full transition-all rounded-lg">
                            <span
                                class="text-sm ease leading-[1.4rem] absolute z-50 -ml-px flex h-full items-center whitespace-nowrap rounded-lg rounded-tr-none rounded-br-none border border-r-0 border-transparent bg-transparent py-2 px-2.5 text-center font-normal text-stone-500 transition-all">
                                <x-icon name='search' class='w-4' />
                            </span>
                            <input type="text"
                                class="pl-9 text-[12.5px] w-[1%] leading-[1.4rem] relative -ml-px block min-w-0 flex-auto rounded-lg border border-solid border-stone-300 bg-white bg-clip-padding py-2 pr-3 text-stone-700 transition-all placeholder:text-gray-500 focus:border-stone-500 focus:outline-none focus:transition-shadow"
                                placeholder="Type here..." />
                        </div>
                    </div>

                    @guest
                    <ul class="flex flex-row justify-end pl-0 mb-0 -ml-1.5 list-none">
                        <li class="flex items-center">
                            <a href="#"
                                class="relative flex flex-wrap px-4 py-2 text-[13px] font-semibold transition-all group hover:px-8 text-stone-950 hover:rounded-full hover:bg-red-100 tracking-wider">
                                <x-icon name='user' class="w-4 sm:hidden sm:mr-2 text-stone-950 group-hover:inline" />
                                <span class="hidden pt-[1px] sm:inline">{{ __('Login') }}</span>
                            </a>
                        </li>
                    </ul>
                    @endguest

                    @auth
                    <ul class="flex flex-row justify-end pl-0 mb-0 -ml-1.5 list-none">
                        <li class="flex items-center">
                            <a href="{{ route('profile.show') }}"
                                class="relative flex flex-wrap px-4 py-2 text-[13px] font-semibold transition-all group hover:px-8 text-stone-950 hover:rounded-full hover:bg-red-100 tracking-wider">
                                <x-icon name='user' class="w-4 sm:hidden sm:mr-2 text-stone-950 group-hover:inline" />
                                <span class="hidden pt-[1px] sm:inline">{{ __('Profile') }}</span>
                            </a>
                        </li>
                        <li class="relative flex items-center pr-2 ml-2">
                            <x-dropdown align='right' width='72'>
                                <x-slot name="trigger">
                                    <a href="#" class="block p-0 text-sm transition-all text-stone-950 ease-nav-brand">
                                        <x-icon name='bell' class="cursor-pointer" />
                                    </a>
                                </x-slot>

                                <x-dropdown-link class='relative'>
                                    <div class="flex py-1">
                                        <div class="my-auto">
                                            <img src="#"
                                                class="inline-flex items-center justify-center mr-4 text-sm text-white h-9 w-9 max-w-none rounded-xl" />
                                        </div>
                                        <div class="flex flex-col justify-center">
                                            <h6 class="mb-1 text-sm font-normal leading-normal dark:text-white">
                                                <span class="font-semibold">New message</span> from Laur
                                            </h6>
                                            <p class="mb-0 text-xs leading-tight text-slate-400 dark:text-white/80">
                                                <i class="mr-1 fa fa-clock"></i>
                                                13 minutes ago
                                            </p>
                                        </div>
                                    </div>
                                </x-dropdown-link>

                                <x-dropdown-link class="relative">
                                    <div class="flex py-1">
                                        <div class="my-auto">
                                            <img src="#"
                                                class="inline-flex items-center justify-center mr-4 text-sm text-white bg-gradient-to-tl from-zinc-800 to-zinc-700 dark:bg-gradient-to-tl dark:from-slate-750 dark:to-gray-850 h-9 w-9 max-w-none rounded-xl" />
                                        </div>
                                        <div class="flex flex-col justify-center">
                                            <h6 class="mb-1 text-sm font-normal leading-normal dark:text-white">
                                                <span class="font-semibold">New album</span> by Travis Scott
                                            </h6>
                                            <p class="mb-0 text-xs leading-tight text-slate-400 dark:text-white/80">
                                                <i class="mr-1 fa fa-clock"></i>
                                                1 day
                                            </p>
                                        </div>
                                    </div>
                                </x-dropdown-link>

                                <x-dropdown-link class="relative">
                                    <div class="flex py-1">
                                        <div
                                            class="inline-flex items-center justify-center my-auto mr-4 text-sm text-white transition-all duration-200 ease-nav-brand bg-gradient-to-tl from-slate-600 to-slate-300 h-9 w-9 rounded-xl">
                                            <svg width="12px" height="12px" viewBox="0 0 43 36" version="1.1"
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink">
                                                <title>credit-card</title>
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <g transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF"
                                                        fill-rule="nonzero">
                                                        <g transform="translate(1716.000000, 291.000000)">
                                                            <g transform="translate(453.000000, 454.000000)">
                                                                <path class="color-background"
                                                                    d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z"
                                                                    opacity="0.593633743"></path>
                                                                <path class="color-background"
                                                                    d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z">
                                                                </path>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </g>
                                            </svg>
                                        </div>
                                        <div class="flex flex-col justify-center">
                                            <h6 class="mb-1 text-sm font-normal leading-normal dark:text-white">
                                                Payment successfully completed</h6>
                                            <p class="mb-0 text-xs leading-tight text-slate-400 dark:text-white/80">
                                                <i class="mr-1 fa fa-clock"></i>
                                                2 days
                                            </p>
                                        </div>
                                    </div>
                                </x-dropdown-link>
                            </x-dropdown>
                        </li>
                    </ul>
                    @endauth
                </div>
            </div>
        </nav>
        {{ $slot }}
    </main>
    @stack('modals')
    @livewireScripts
    <script>
        Livewire.on('saved', () => {
            window.location.reload();
        });
    </script>

</body>

</html>
