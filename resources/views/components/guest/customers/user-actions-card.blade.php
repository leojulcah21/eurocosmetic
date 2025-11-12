<div class="relative w-[950px] h-[650px] bg-white m-5 rounded-[30px] shadow-[0_0px_30px_rgba(0,0,0,.2)] overflow-hidden">

    <!-- Fondo lateral -->
    <div class="absolute -left-[250%] w-[300%] h-full bg-stone-950 z-[2] rounded-[150px] transition-all duration-[1800ms] ease-in-out">
    </div>

    <!-- Panel de enlaces -->
    <div class="absolute flex flex-col items-center justify-center z-[2] w-1/2 h-full text-white
            transition-transform duration-[1800ms] ease-in-out translate-x-0 left-0">
        <div class="relative flex flex-col items-center justify-center w-full h-full space-y-3 text-center">
            <x-authentication-card-logo class="w-48 h-48 mx-auto text-stone-50" />
            <h2 class="text-lg font-semibold">
                {{ $title ?? '' }}
            </h2>
            <div class='pt-3'>
                {{ $links ?? '' }}
            </div>
        </div>
    </div>

    <!-- Contenido del formulario -->
    <div class="absolute flex items-center justify-center z-[1] w-1/2 h-full bg-white transition-transform duration-[1800ms] ease-in-out right-0 translate-x-0">
        <div class="w-full px-16 py-6 transition-transform duration-[1800ms] ease-in-out translate-x-0">
            <p class="text-[15px] text-justify text-stone-900">
                {{ $description ?? '' }}
            </p>

            {{ $slot }}
        </div>
    </div>
</div>
