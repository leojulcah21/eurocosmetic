<div x-data="{ isRegister: {{ json_encode(request()->routeIs('register.client')) }} }"
    class="relative w-[950px] h-[650px] bg-white m-5 rounded-[30px] shadow-[0_0px_30px_rgba(0,0,0,.2)] overflow-hidden">

    <!-- Formulario -->
    <div class="absolute flex items-center justify-center z-[1] w-1/2 h-full bg-white transition-transform duration-[1800ms] ease-in-out right-0 translate-x-0"
        :class="isRegister ? 'right-[200%] translate-x-full' : ''">
        <div class="w-full px-12 py-6 transition-transform duration-[1800ms] ease-in-out"
            :class="isRegister ? 'translate-x-[200%]' : 'translate-x-0'">
            {{ $slot }}
        </div>
    </div>
    <!-- Fondo que se mueve (antes era before:) -->
    <div class="absolute -left-[250%] w-[300%] h-full bg-stone-950 z-[2] rounded-[150px] transition-all duration-[1800ms] ease-in-out"
        :class="isRegister ? 'left-1/2' : ''">
    </div>

    <!-- Panel de enlaces -->
    <div class="absolute flex flex-col z-[2] items-center justify-center w-1/2 h-full text-white
            transition-transform duration-[1800ms] ease-in-out"
        :class="isRegister ? 'translate-x-full left-0' : 'translate-x-0 left-0'">
        <div class="relative flex flex-col items-center justify-center w-full h-full space-y-4 text-center">
            <x-authentication-card-logo class="mx-auto h-60 w-60 text-stone-50" />
            <template x-if='!isRegister'>
                <div>
                    <h2 class="text-xl font-bold">¿Eres nuevo aquí?</h2>
                    <p class="text-sm">Crea una cuenta y empieza tu viaje con nosotros</p>
                    <div class='mt-6'>
                        <x-auth-link href="{{ route('register.client') }}"
                            @click.prevent="isRegister = true; history.pushState(null, '', '{{ route('register.client') }}');">
                            {{ __('Register') }}
                        </x-auth-link>
                    </div>
                </div>
            </template>

            <template x-if='isRegister'>
                <div>
                    <h2 class="text-xl font-bold">¿Ya tienes cuenta?</h2>
                    <p class="text-sm">Inicia sesión y sigue donde lo dejaste</p>
                    <div class='mt-6'>
                        <x-auth-link href="{{ route('login.client') }}"
                            @click.prevent="isRegister = false; history.pushState(null, '', '{{ route('login.client') }}');">
                            {{ __('Log in') }}
                        </x-auth-link>
                    </div>
                </div>
            </template>
        </div>
    </div>
</div>
