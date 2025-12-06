@props(['class' => ''])

<footer id="footer" class="{{ $class }}">
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
                            <a href="https://www.facebook.com/Eurocosmetic.Import/" class="hover:text-white" target="_blank">
                                <i class="bi bi-facebook"></i>
                            </a>
                            <a href="https://www.linkedin.com/company/corporaci%C3%B3n-eurocosmetic/?originalSubdomain=pe" class="hover:text-white">
                                <i class="bi bi-linkedin"></i>
                            </a>
                            {{-- <a href="#" class="hover:text-white">
                                <i class="bi bi-twitter-x"></i>
                            </a>
                            <a href="#" class="hover:text-white">
                                <i class="bi bi-tiktok"></i>
                            </a>
                            <a href="#" class="hover:text-white">
                                <i class="bi bi-pinterest"></i>
                            </a> --}}
                            <a href="https://www.youtube.com/@corporacioneurocosmeticper8201" class="hover:text-white"  target="_blank">
                                <i class="bi bi-youtube"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Shop Links -->
                <div>
                    <h4 class="mb-4 text-lg font-semibold text-white">Tienda</h4>
                    <ul class="space-y-2 text-sm">
                        <li><a href="#" class="text-stone-300 hover:text-white">Recién Llegados</a></li>
                        <li><a href="#" class="hover:text-white">Más Vendido</a></li>
                        <li><a href="#" class="hover:text-white">Tintes</a></li>
                        <li><a href="#" class="hover:text-white">Shampoos</a></li>
                        <li><a href="#" class="hover:text-white">Acondicionadores</a></li>
                        <li><a href="#" class="hover:text-white">Liquidación</a></li>
                    </ul>
                </div>

                <!-- Support Links -->
                <div>
                    <h4 class="mb-4 text-lg font-semibold text-white">Soporte</h4>
                    <ul class="space-y-2 text-sm">
                        <li><a href="#" class="hover:text-white">Estado de Orden</a></li>
                        <li><a href="#" class="hover:text-white">Información de Envío</a></li>
                        <li><a href="#" class="hover:text-white">Devoluciones y Cambios</a></li>
                        <li><a href="#" class="hover:text-white">Guía de tipos de cabello</a></li>
                        <li><a href="#" class="hover:text-white">Contáctanos</a></li>
                    </ul>
                </div>

                <!-- Contact -->
                <div>
                    <h4 class="mb-4 text-lg font-semibold text-white">Información de Contacto</h4>
                    <div class="space-y-3 text-sm">
                        <div class="flex items-start gap-2">
                            <i class="text-lg bi bi-geo-alt text-primary-500"></i>
                            <span>Jr. Faustino Sánchez Carrión 370, Magdalena del Mar 15076</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <i class="text-lg bi bi-whatsapp text-primary-500"></i>
                            <a href="https://wa.me/51975344791" target='_blank' class='hover:underline'>+51 975 344 791</a>
                        </div>
                        <div class="flex items-start gap-2">
                            <i class="text-lg bi bi-clock text-primary-500"></i>
                            <span>
                                <strong> {{ __('Monday') }} - {{ __('Friday') }}: </strong> 9am-6pm <br>
                                <strong> {{ __('Saturday') }}: </strong> 9:30am-12:30pm <br>
                                <strong> {{ __('Sunday') }}: </strong> {{ __('Closed') }}
                            </span>
                        </div>
                    </div>

                    {{-- <div class="flex gap-3 mt-6">
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
                    </div> --}}
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
                        <i class="bi bi-wallet2"></i>
                        <i class="bi bi-bank"></i>
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
