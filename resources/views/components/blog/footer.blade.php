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
