@php
use App\Helpers\RoleHelper;
@endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Eurocosmetic') }}</title>

    <link rel="icon" type="image/png" href="{{ asset('img/icono.png') }}">

    @include('layouts.partials.fonts')
    @include('layouts.partials.icons')

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
</head>

<body class="p-0 m-0 font-sans bg-white text-stone-950">
    <header id="header" class="sticky top-0 z-50 bg-white shadow">
        <!-- Top Bar -->
        <div class="bg-stone-100 ">
            <div class="container max-w-screen-xl px-2 mx-auto">
                <div class="flex items-center text-sm">
                    <!-- Teléfono (izquierda, oculto en móvil) -->
                    <div class="items-center hidden w-1/3 gap-2 lg:flex">
                        <i class="mr-2 bi bi-telephone-fill"></i>
                        <span>Need help? Call us: </span>
                        <a href="tel:+1234567890" class="text-gray-600 hover:underline">+1 (234) 567-890</a>
                    </div>
                    <!-- Slider anuncios (centro) -->
                    <div class="flex justify-center w-1/3">
                        <div class="relative w-full h-10 max-w-xs overflow-hidden font-medium" id="anuncio-slider">
                            <div id="anuncio-wrapper" class="transition-transform duration-700">
                                <div class="flex items-center justify-center h-10 leading-10 text-center">
                                    🚚 Free shipping on orders over $120
                                </div>
                                <div class="flex items-center justify-center h-10 leading-10 text-center">
                                    💰 30 days money back guarantee.
                                </div>
                                <div class="flex items-center justify-center h-10 leading-10 text-center">
                                    🎁 30% off on your first order
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Idioma y moneda (derecha, oculto en móvil) -->
                    <div class="justify-end hidden w-1/3 gap-4 lg:flex">
                        <!-- Dropdown Idioma -->
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button class="flex items-center gap-2 px-2 py-1 rounded hover:bg-stone-200">
                                    <i class="bi bi-translate"></i>EN
                                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </button>
                            </x-slot>
                            <x-dropdown-link href="#" class="font-semibold">
                                <span class='mr-2 font-bold text-green-500 '><i class="bi bi-check2"></i></span>English
                            </x-dropdown-link>
                            <x-dropdown-link href="#">{{ __('Spanish') }}</x-dropdown-link>
                        </x-dropdown>
                        <!-- Dropdown Moneda -->
                        <x-dropdown align="right" width="40">
                            <x-slot name="trigger">
                                <button class="flex items-center gap-2 px-2 py-1 rounded hover:bg-stone-200">
                                    <i class="bi bi-currency-dollar"></i>PEN
                                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </button>
                            </x-slot>
                            <x-dropdown-link href="#" class="font-semibold">
                                <span class='mr-2 text-green-500 '><i class="bi bi-check2"></i></span>PEN
                            </x-dropdown-link>
                            <x-dropdown-link href="#">
                                {{ __('Coming Soon') }}
                            </x-dropdown-link>
                        </x-dropdown>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Header -->
        <div class="bg-white border-b">
            <div class="container max-w-screen-xl px-4 py-2 mx-auto">
                <div class="flex items-center justify-between py-3">
                    <!-- Logo -->
                    <a href="{{ route('home') }}" class="flex items-center gap-2">
                        <img src="{{ asset('img/logo.png') }}" class="w-48 m-auto" alt="tailus logo">
                    </a>
                    <!-- Search -->
                    <form class="relative hidden w-full max-w-lg md:w-2/3 md:flex">
                        <div class="flex items-center w-full bg-white border shadow-sm border-stone-200 rounded-xl">
                            <input type="text" placeholder="Search for products"
                                class="flex-1 w-full py-3 pl-4 pr-20 text-sm bg-transparent border-0 rounded-lg placeholder-stone-400 text-stone-600 focus:outline-none focus:ring-stone-800">
                            <button type="submit"
                                class="absolute items-center justify-center px-6 py-1.5 text-white transition-colors rounded-lg bg-stone-900 right-1 hover:bg-stone-800">
                                <!-- icon: puedes dejar <i class="bi bi-search"></i> o SVG inline -->
                                <span class='text-lg'><i class="bi bi-search"></i></span>
                            </button>
                        </div>
                    </form>

                    <!-- Actions -->
                    <div class="flex items-center gap-2 text-2xl">
                        <!-- Mobile Search Toggle -->
                        <button class="block p-2 xl:hidden" type="button">
                            <i class="bi bi-search"></i>
                        </button>

                        <!-- Account Dropdown -->
                        <x-dropdown align="left" width="72">
                            <x-slot name="trigger">
                                <div class='relative'>
                                    <button class="p-2">
                                        <i class="bi bi-person"></i>
                                    </button>
                                </div>
                            </x-slot>

                            <div class="px-4 pt-3 @auth py-3 border-b @endauth">
                                <h6 class="text-sm font-semibold">
                                    @auth
                                    @if (App\Helpers\RoleHelper::hasRole(auth()->user(), 'client'))
                                    {{ __('Welcome') }}, <span class="text-stone-700">{{ Auth::user()->name }}</span>
                                    @else
                                    {{ __('Welcome to') }} <span class="text-stone-700">Eurocosmetic</span>
                                    @endif
                                    @endauth

                                    @guest
                                    {{ __('Welcome to') }} <span class="text-stone-700">Eurocosmetic</span>
                                    @endguest
                                </h6>
                                <p class="mb-0 text-xs text-stone-500">
                                    {{ __('Access your account and manage your orders') }}
                                </p>
                            </div>


                            @auth
                            @if (App\Helpers\RoleHelper::hasRole(auth()->user(), 'client'))
                            <x-guest-links />
                            @endif
                            @endauth

                            <div class="px-4 py-3 border-t bg-stone-50">
                                {{-- Mostrar login/register si es invitado o no es cliente --}}
                                @if (auth()->guest() || !App\Helpers\RoleHelper::hasRole(auth()->user(), 'client'))
                                <x-account-guest-links />
                                @else
                                {{-- Mostrar logout si es cliente --}}
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit"
                                        class="block w-full px-4 py-2 text-sm leading-5 text-center text-red-600 transition duration-150 ease-in-out border border-red-600 rounded-full hover:bg-red-50">
                                        {{ __('Log Out') }}
                                    </button>
                                </form>
                                @endif
                            </div>
                        </x-dropdown>

                        <!-- Wishlist -->
                        <a href="account.html" class="relative hidden p-2 md:block">
                            <i class="bi bi-heart"></i>
                            <span
                                class="absolute top-0 right-0 px-1 text-xs text-white bg-pink-600 rounded-full">0</span>
                        </a>

                        <!-- Cart -->
                        <a href="cart.html" class="relative p-2">
                            <i class="bi bi-cart3"></i>
                            <span
                                class="absolute top-0 right-0 px-1 text-xs text-white bg-blue-600 rounded-full">3</span>
                        </a>

                        <!-- Mobile Navigation Toggle -->
                        <button class="block p-2 xl:hidden" type="button">
                            <i class="bi bi-list"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Navigation -->
        <div class="bg-stone-950">
            <div class="container relative max-w-screen-xl px-4 py-1 mx-auto">
                <nav id="navmenu" class="flex flex-wrap gap-4">
                    <!-- Ejemplo de menú, puedes expandirlo con megamenús y submenús usando Alpine.js -->
                    <x-nav-x-link href="{{ route('home') }}" :active="request()->routeIs('home')">Home</x-nav-x-link>
                    <x-nav-x-link>About</x-nav-x-link>
                    <x-nav-x-link>Category</x-nav-x-link>
                    <x-nav-x-link>Product Details</x-nav-x-link>
                    <x-nav-x-link>Cart</x-nav-x-link>
                    <x-nav-x-link>Checkout</x-nav-x-link>
                    <!-- Dropdown ejemplo -->
                    <div x-data="{ open: false }" class="relative">
                        <button @click="open = !open"
                            class="flex items-center gap-1 px-4 py-2 text-stone-300 hover:text-white hover:font-medium text-[13px]">
                            Dropdown <i class="bi bi-chevron-down"></i>
                        </button>
                        <ul x-show="open" @click.away="open = false"
                            class="absolute left-0 z-10 w-40 mt-2.5 border rounded shadow bg-stone-950 border-stone-800">
                            <div class="w-0 h-0 absolute -top-2.5 left-2
                                border-l-[10px] border-l-transparent
                                border-r-[10px] border-r-transparent
                                border-b-[10px] border-b-stone-950">
                            </div>
                            <li>
                                <a href="#" class="block px-4 py-2 text-white hover:bg-stone-800 text-[12px]">
                                    Dropdown 1
                                </a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-2 text-white hover:bg-stone-800 text-[12px]">
                                    Dropdown 2
                                </a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-2 text-white hover:bg-stone-800 text-[12px]">
                                    Dropdown 3
                                </a>
                            </li>
                        </ul>
                    </div>
                    <x-nav-x-link>Contact</x-nav-x-link>
                </nav>
            </div>
        </div>

        <!-- Mobile Search Form -->
        <div id="mobileSearch" class="hidden bg-white border-b">
            <div class="container max-w-screen-xl px-4 py-2 mx-auto">
                <form class="flex">
                    <input type="text" class="flex-1 px-3 py-2 border rounded-l focus:outline-none"
                        placeholder="Search for products">
                    <button class="px-4 py-2 text-white bg-blue-600 rounded-r hover:bg-blue-700" type="submit">
                        <i class="bi bi-search"></i>
                    </button>
                </form>
            </div>
        </div>
    </header>
    <div
        class="flex items-center justify-center w-full mt-20 transition-opacity opacity-100 duration-750 lg:grow starting:opacity-0">
        {{ $slot }}
    </div>

    <footer id="footer" class="mt-20 text-gray-300 bg-stone-950">
        <!-- Footer Main -->
        <div class="py-12">
            <div class="container px-4 mx-auto">
                <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-4">

                    <!-- About -->
                    <div>
                        <div class='relative'>
                            <a href="{{ route('home') }}" class="text-2xl font-bold text-white">
                                <x-application-logo class="m-auto -mt-10 text-white h-72 w-72" />
                            </a>
                            <p class="mt-4 text-sm leading-relaxed">
                                {{ __("Get the best hair products only from us. At a low price! Go for it!") }}
                            </p>
                        </div>

                        <div class="mt-6">
                            <h5 class="mb-3 font-semibold text-white">{{ __('Connect With Us') }}</h5>
                            <div class="flex gap-4 text-xl">
                                <a href="#" class="hover:text-white"><i class="bi bi-facebook"></i></a>
                                <a href="#" class="hover:text-white"><i class="bi bi-instagram"></i></a>
                                <a href="#" class="hover:text-white"><i class="bi bi-twitter-x"></i></a>
                                <a href="#" class="hover:text-white"><i class="bi bi-tiktok"></i></a>
                                <a href="#" class="hover:text-white"><i class="bi bi-pinterest"></i></a>
                                <a href="#" class="hover:text-white"><i class="bi bi-youtube"></i></a>
                            </div>
                        </div>
                    </div>

                    <!-- Shop Links -->
                    <div>
                        <h4 class="mb-4 text-lg font-semibold text-white">Shop</h4>
                        <ul class="space-y-2 text-sm">
                            <li><a href="#" class="text-stone-300 hover:text-white">New Arrivals</a></li>
                            <li><a href="#" class="hover:text-white">Bestsellers</a></li>
                            <li><a href="#" class="hover:text-white">Women's Clothing</a></li>
                            <li><a href="#" class="hover:text-white">Men's Clothing</a></li>
                            <li><a href="#" class="hover:text-white">Accessories</a></li>
                            <li><a href="#" class="hover:text-white">Sale</a></li>
                        </ul>
                    </div>

                    <!-- Support Links -->
                    <div>
                        <h4 class="mb-4 text-lg font-semibold text-white">Support</h4>
                        <ul class="space-y-2 text-sm">
                            <li><a href="#" class="hover:text-white">Help Center</a></li>
                            <li><a href="#" class="hover:text-white">Order Status</a></li>
                            <li><a href="#" class="hover:text-white">Shipping Info</a></li>
                            <li><a href="#" class="hover:text-white">Returns & Exchanges</a></li>
                            <li><a href="#" class="hover:text-white">Size Guide</a></li>
                            <li><a href="#" class="hover:text-white">Contact Us</a></li>
                        </ul>
                    </div>

                    <!-- Contact -->
                    <div>
                        <h4 class="mb-4 text-lg font-semibold text-white">Contact Information</h4>
                        <div class="space-y-3 text-sm">
                            <div class="flex items-start gap-2">
                                <i class="text-lg bi bi-geo-alt text-primary-500"></i>
                                <span>123 Fashion Street, New York, NY 10001</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <i class="text-lg bi bi-telephone text-primary-500"></i>
                                <span>+1 (555) 123-4567</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <i class="text-lg bi bi-envelope text-primary-500"></i>
                                <span>hello@example.com</span>
                            </div>
                            <div class="flex items-start gap-2">
                                <i class="text-lg bi bi-clock text-primary-500"></i>
                                <span>Monday-Friday: 9am-6pm<br>Saturday: 10am-4pm<br>Sunday: Closed</span>
                            </div>
                        </div>

                        <div class="flex gap-3 mt-6">
                            <a href="#"
                                class="flex items-center gap-2 px-3 py-2 text-sm rounded-lg bg-stone-900 hover:bg-stone-800">
                                <i class="text-xl bi bi-apple"></i>
                                <span>App Store</span>
                            </a>
                            <a href="#"
                                class="flex items-center gap-2 px-3 py-2 text-sm rounded-lg bg-stone-900 hover:bg-stone-800">
                                <i class="text-xl bi bi-google-play"></i>
                                <span>Google Play</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer Bottom -->
        <div class="py-6 border-t border-stone-700">
            <div class="container px-4 mx-auto">
                <div class="flex flex-col items-center justify-between gap-4 lg:flex-row">

                    <div class="text-xs text-center lg:text-left">
                        <p>
                            ©
                            <script>
                                document.write(new Date().getFullYear() + ",");
                            </script>
                            Copyright
                            <span class="font-semibold tracking-wide text-white uppercase font-raleway">
                                Eurocosmetic
                            </span>.
                            {{ __('All rights reserved.') }}
                        </p>
                        <p class="-mt-0.5 text-white">
                            {{ __('Designed by') }}
                            <a href="https://bootstrapmade.com/"
                                class="font-bold uppercase hover:text-stone-400 font-miriam">
                                BootstrapMade
                            </a>
                            &
                            <a href="https://www.instagram.com/_darkcoding22_/" class='hover:text-stone-400'>
                                <span class='text-xl font-bold font-lavish'>Dark</span>
                                <span class='uppercase font-code font-lg -ms-0.5'>Coding</span>
                            </a>
                        </p>
                    </div>

                    <div class="flex flex-wrap items-center justify-center gap-6 text-lg lg:justify-end">
                        <div class="flex gap-3">
                            <i class="bi bi-credit-card"></i>
                            <i class="bi bi-paypal"></i>
                            <i class="bi bi-apple"></i>
                            <i class="bi bi-google"></i>
                            <i class="bi bi-shop"></i>
                            <i class="bi bi-cash"></i>
                        </div>
                        <div class="flex gap-4 text-sm">
                            <a href="{{ route('terms.show') }}" class="hover:text-white">Terms</a>
                            <a href="{{ route('policy.show') }}" class="hover:text-white">Privacy</a>
                            <a href="#" class="hover:text-white">Cookies</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    @livewireScripts
</body>

</html>
