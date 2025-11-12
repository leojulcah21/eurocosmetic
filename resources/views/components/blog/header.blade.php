@props(['class' => ''])
<!-- Main Header -->
<div class="{{ $class }}">
    <div class="container py-2 mx-auto bg-white max-w-screen-2xl">
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

                    <div class="px-4 pt-3 pb-4 @auth py-3 border-b @endauth">
                        <h6 class="text-sm font-semibold">
                            @role('Customer')
                                @php($user = Auth::user())
                                {{ __('Welcome') }}, <span class="text-stone-700">{{ $user->name }}</span>
                            @endrole

                            @role('Administrator', 'Employee')
                                {{ __('Welcome to') }} <span class="text-stone-700">Eurocosmetic</span>
                            @endrole

                            @guest
                                {{ __('Welcome to') }} <span class="text-stone-700">Eurocosmetic</span>
                            @endguest
                        </h6>
                        <p class="mb-0 text-xs text-stone-500">
                            {{ __('Access your account and manage your orders') }}
                        </p>
                    </div>

                    @role('Customer')
                        <x-blog.client-links class='py-2' />
                    @endrole

                    <div class="px-4 py-3 border-t bg-stone-50">
                        {{-- Mostrar login/register si es invitado o no es cliente --}}
                        @role('Administrator', 'Employee')
                            <x-account-guest-links />
                        @endrole
                        @guest
                            <x-account-guest-links />
                        @endguest
                        @role('Customer')
                            {{-- Mostrar logout si es cliente --}}
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                @php($role = Auth::user()?->role?->name)
                                <input type="hidden" name="last_role" value="{{ $role ?? 'Customer' }}">

                                <button type="submit"
                                    class="block w-full px-4 py-2 text-sm leading-5 text-center text-red-600 transition duration-150 ease-in-out border border-red-600 rounded-full hover:bg-red-50">
                                    {{ __('Log Out') }}
                                </button>
                            </form>
                        @endrole
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
