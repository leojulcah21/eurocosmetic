<x-blog-layout>
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
                            <div class="px-4 pt-3 text-sm bg-stone-50 @auth py-3 border-b @endauth">
                                <h6 class="text-base font-semibold">
                                    @auth
                                    {{ __('Welcome') }}, <span class="text-stone-700">{{ Auth::user()->name }}</span>
                                    @endauth
                                    @guest
                                    {{ __('Welcome to') }} <span class="text-stone-700">Eurocosmetic</span>
                                    @endguest
                                </h6>
                                <p class="mb-0 text-xs text-stone-500">Access account and manage orders</p>
                            </div>
                            <div class="py-2">
                                @auth
                                <x-dropdown-link class="flex items-center px-4 py-2 hover:bg-gray-100" href="#"><i
                                        class="mr-2 bi bi-person-circle"></i>My Profile</x-dropdown-link>
                                <x-dropdown-link class="flex items-center px-4 py-2 hover:bg-gray-100" href="#"><i
                                        class="mr-2 bi bi-bag-check"></i>My Orders</x-dropdown-link>
                                <x-dropdown-link class="flex items-center px-4 py-2 hover:bg-gray-100" href="#"><i
                                        class="mr-2 bi bi-heart"></i>My Wishlist</x-dropdown-link>
                                <x-dropdown-link class="flex items-center px-4 py-2 hover:bg-gray-100" href="#"><i
                                        class="mr-2 bi bi-gear"></i>Settings</x-dropdown-link>
                                @endauth
                            </div>

                            <div class="px-4 py-3 border-t bg-stone-50">
                                @guest
                                {{-- Cuando el usuario NO ha iniciado sesión --}}
                                <x-dropdown-link href="{{ route('login') }}"
                                    class="block w-full px-4 py-2 mb-2 text-center text-white rounded-full bg-stone-950 hover:bg-stone-900">
                                    {{ __('Login') }}
                                </x-dropdown-link>
                                <x-dropdown-link href="{{ route('register') }}"
                                    class="block w-full px-4 py-2 text-center border rounded-full text-stone-950 border-stone-950 hover:bg-stone-100">
                                    {{ __('Register') }}
                                </x-dropdown-link>
                                @endguest

                                @auth
                                {{-- Cuando el usuario YA inició sesión --}}
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit"
                                        class="block w-full px-4 py-2 text-sm leading-5 text-center text-red-600 transition duration-150 ease-in-out border border-red-600 rounded-full hover:bg-red-50">
                                        {{ __('Log Out') }}
                                    </button>
                                </form>
                                @endauth
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
                        <button class="block p-2 xl:hidden" type="button" wire:>
                            <i class="bi bi-list"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Navigation -->
        <div class="bg-stone-950">
            <div class="container relative max-w-screen-xl px-4 mx-auto">
                <nav id="navmenu" class="flex flex-wrap gap-4">
                    <!-- Ejemplo de menú, puedes expandirlo con megamenús y submenús usando Alpine.js -->
                    <x-nav-x-link href="{{ route('home') }}" :active="request()->routeIs('home')">Home</x-nav-x-link>
                    <x-nav-x-link>About</x-nav-x-link>
                    <x-nav-x-link>Category</x-nav-x-link>
                    <x-nav-x-link>Product
                        Details</x-nav-x-link>
                    <x-nav-x-link>Cart</x-nav-x-link>
                    <x-nav-x-link>Checkout</x-nav-x-link>
                    <!-- Dropdown ejemplo -->
                    <div x-data="{ open: false }" class="relative">
                        <button @click="open = !open"
                            class="flex items-center gap-1 px-4 py-2 text-stone-300 hover:text-white hover:font-medium">
                            Dropdown <i class="bi bi-chevron-down"></i>
                        </button>
                        <ul x-show="open" @click.away="open = false"
                            class="absolute left-0 z-10 w-40 mt-2 border rounded shadow bg-stone-950 border-stone-800">
                            <li><a href="#" class="block px-4 py-2 text-white hover:bg-stone-700">Dropdown 1</a></li>
                            <li><a href="#" class="block px-4 py-2 text-white hover:bg-stone-700">Dropdown 2</a></li>
                            <li><a href="#" class="block px-4 py-2 text-white hover:bg-stone-700">Dropdown 3</a></li>
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
        <main class="flex max-w-[335px] w-full flex-col-reverse lg:max-w-4xl lg:flex-row">
            <div
                class="text-[13px] leading-[20px] flex-1 p-6 pb-12 lg:p-20 bg-white shadow-[inset_0px_0px_0px_1px_rgba(26,26,0,0.16)] rounded-bl-lg rounded-br-lg lg:rounded-tl-lg lg:rounded-br-none">
                <h1 class="mb-1 font-medium">Let's get started</h1>
                <p class="mb-2 text-[#706f6c]">Laravel has an incredibly rich ecosystem. <br>We suggest starting with
                    the following.</p>
                <ul class="flex flex-col mb-4 lg:mb-6">
                    <li
                        class="flex items-center gap-4 py-2 relative before:border-l before:border-[#e3e3e0] before:top-1/2 before:bottom-0 before:left-[0.4rem] before:absolute">
                        <span class="relative py-1 bg-white">
                            <span
                                class="flex items-center justify-center rounded-full bg-[#FDFDFC] shadow-[0px_0px_1px_0px_rgba(0,0,0,0.03),0px_1px_2px_0px_rgba(0,0,0,0.06)] w-3.5 h-3.5 border border-[#e3e3e0]">
                                <span class="rounded-full bg-[#dbdbd7] w-1.5 h-1.5"></span>
                            </span>
                        </span>
                        <span>
                            Read the
                            <a href="https://laravel.com/docs" target="_blank"
                                class="inline-flex items-center space-x-1 font-medium underline underline-offset-4 text-[#f53003] ml-1">
                                <span>Documentation</span>
                                <svg width="10" height="11" viewBox="0 0 10 11" fill="none"
                                    xmlns="http://www.w3.org/2000/svg" class="w-2.5 h-2.5">
                                    <path d="M7.70833 6.95834V2.79167H3.54167M2.5 8L7.5 3.00001" stroke="currentColor"
                                        stroke-linecap="square" />
                                </svg>
                            </a>
                        </span>
                    </li>
                    <li
                        class="flex items-center gap-4 py-2 relative before:border-l before:border-[#e3e3e0] before:bottom-1/2 before:top-0 before:left-[0.4rem] before:absolute">
                        <span class="relative py-1 bg-white">
                            <span
                                class="flex items-center justify-center rounded-full bg-[#FDFDFC] shadow-[0px_0px_1px_0px_rgba(0,0,0,0.03),0px_1px_2px_0px_rgba(0,0,0,0.06)] w-3.5 h-3.5 border border-[#e3e3e0]">
                                <span class="rounded-full bg-[#dbdbd7] w-1.5 h-1.5"></span>
                            </span>
                        </span>
                        <span>
                            Watch video tutorials at
                            <a href="https://laracasts.com" target="_blank"
                                class="inline-flex items-center space-x-1 font-medium underline underline-offset-4 text-[#f53003] ml-1">
                                <span>Laracasts</span>
                                <svg width="10" height="11" viewBox="0 0 10 11" fill="none"
                                    xmlns="http://www.w3.org/2000/svg" class="w-2.5 h-2.5">
                                    <path d="M7.70833 6.95834V2.79167H3.54167M2.5 8L7.5 3.00001" stroke="currentColor"
                                        stroke-linecap="square" />
                                </svg>
                            </a>
                        </span>
                    </li>
                </ul>
                <ul class="flex gap-3 text-sm leading-normal">
                    <li>
                        <a href="https://cloud.laravel.com" target="_blank"
                            class="inline-block hover:bg-black hover:border-black px-5 py-1.5 bg-[#1b1b18] rounded-sm border border-black text-white text-sm leading-normal">
                            Deploy now
                        </a>
                    </li>
                </ul>
            </div>
            <div
                class="bg-[#fff2f2] relative lg:-ml-px -mb-px lg:mb-0 rounded-t-lg lg:rounded-t-none lg:rounded-r-lg aspect-[335/376] lg:aspect-auto w-full lg:w-[438px] shrink-0 overflow-hidden">
                <x-application-logo class="m-auto mt-10 h-72 w-72 text-stone-950" />
            </div>
        </main>
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

                    <div class="text-sm text-center lg:text-left">
                        <p>© <span>Copyright</span> <strong class="text-white">Eurocosmetic</strong>.
                            {{ __('All rights reserved.') }}
                        </p>
                        <p class="mt-1 text-white"> {{ __('Designed by') }}
                            <a href="https://bootstrapmade.com/"
                                class="font-bold uppercase hover:text-stone-400 font-miriam">
                                BootstrapMade
                            </a> &
                            <a href="https://www.instagram.com/_darkcoding22_/" class='hover:text-stone-400'>
                                <span class='text-2xl font-bold font-lavish'>Dark</span><span
                                    class='uppercase font-code font-lg'>Coding</span>
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
                            <a href="#" class="hover:text-white">Terms</a>
                            <a href="#" class="hover:text-white">Privacy</a>
                            <a href="#" class="hover:text-white">Cookies</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</x-blog-layout>
