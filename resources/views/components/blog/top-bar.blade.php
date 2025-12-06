@props(['class' => ''])
<!-- Top Bar -->
<div class="{{ $class }}">
    <div class="container mx-auto max-w-screen-2xl">
        <div class="flex items-center text-sm">
            <!-- Teléfono (izquierda, oculto en móvil) -->
            <div class="items-center hidden w-1/3 gap-2 lg:flex">
                <i class="mr-2 bi bi-whatsapp"></i>
                <span>¿Tienes dudas? Escríbenos al: </span>
                <a href="https://wa.me/51975344791?text=Hola,%20tengo%20una%20consulta." target="_blank" class="text-gray-600 hover:underline">
                    +51 975 344 791
                </a>
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
                        <span class='mr-2 font-bold text-green-500 '>
                            <i class="bi bi-check2"></i>
                        </span>Español
                    </x-dropdown-link>
                    <x-dropdown-link href="#">
                        {{ __('Coming Soon') }}
                    </x-dropdown-link>
                </x-dropdown>
                <!-- Dropdown Moneda -->
                <x-dropdown align="right" width="40">
                    <x-slot name="trigger">
                        <button class="flex items-center gap-2 px-2 py-1 rounded hover:bg-stone-200">
                            <x-icon name="sol" class="w-3.5 h-3.5" />
                            PEN
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
