@props(['class' => ''])
<footer class="pt-4 {{ $class }}">
    <div class="w-full px-6 mx-auto">
        <div class="flex flex-wrap items-center -mx-3 lg:justify-between">
            <div class="w-full max-w-full px-3 mt-0 mb-6 shrink-0 lg:mb-0 lg:w-1/2 lg:flex-none">
                <div class="text-[12px] leading-normal text-center text-stone-500 lg:text-left">
                    ©
                    <script>
                        document.write(new Date().getFullYear() + ",");
                    </script>
                    Copyright <a href='{{ route('home') }}' class="font-bold uppercase text-stone-700 hover:underline font-raleway">Eurocosmetic</a>.
                    {{ __('All rights reserved.') }}
                    {{ __('Designed by') }}
                    <a href="https://www.creative-tim.com" class="text-sm font-semibold text-stone-700 font-work hover:underline"
                        target="_blank">
                        Creative Tim
                    </a> &
                    <a href="https://www.instagram.com/_darkcoding22_/" class='text-stone-700 hover:underline'>
                        <span class='text-lg font-bold font-lavish'>Dark</span><span
                            class='text-sm uppercase font-code'>Coding</span>
                    </a>
                </div>
            </div>
            <div class="w-full max-w-full px-3 mt-0 shrink-0 lg:w-1/2 lg:flex-none">
                <ul class="flex flex-wrap justify-center pl-0 mb-0 list-none lg:justify-end">
                    <li class="nav-item">
                        <a href="https://www.creative-tim.com"
                            class="block px-4 pt-0 pb-1 text-sm font-normal transition-colors ease-in-out text-stone-500"
                            target="_blank">Creative Tim</a>
                    </li>
                    <li class="nav-item">
                        <a href="https://www.creative-tim.com/presentation"
                            class="block px-4 pt-0 pb-1 text-sm font-normal transition-colors ease-in-out text-stone-500"
                            target="_blank">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a href="https://creative-tim.com/blog"
                            class="block px-4 pt-0 pb-1 text-sm font-normal transition-colors ease-in-out text-stone-500"
                            target="_blank">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a href="https://www.creative-tim.com/license"
                            class="block px-4 pt-0 pb-1 pr-0 text-sm font-normal transition-colors ease-in-out text-stone-500"
                            target="_blank">License</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>
