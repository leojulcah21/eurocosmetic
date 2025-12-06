@props(['class' => ''])

<div class="{{ $class }}">
    <div class="container relative max-w-screen-2xl py-1.5 mx-auto">
        <nav id="navmenu" class="flex flex-wrap gap-4">
            <!-- Ejemplo de menú, puedes expandirlo con megamenús y submenús usando Alpine.js -->
            <x-nav-x-link href="{{ route('home') }}" :active="request()->routeIs('home')">{{ __('Home') }}</x-nav-x-link>
            <x-nav-x-link>¿Quiénes somos?</x-nav-x-link>
            <x-nav-x-link>Categorías</x-nav-x-link>
            <x-nav-x-link href="{{ route('products') }}" :active="request()->routeIs('products')">Productos</x-nav-x-link>
            {{-- <x-nav-x-link>Cart</x-nav-x-link>
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
            </div> --}}
            <x-nav-x-link>Contáctanos</x-nav-x-link>
        </nav>
    </div>
</div>
