<x-auth-layout>
    <div class="sm:mx-auto sm:w-full sm:max-w-sm">
        <x-application-logo class="m-auto h-[295px] w-[295px]" />
    </div>
    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
        <x-validation-errors class="mb-4" />
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <input type="hidden" name="context" value="company">
            <div class="relative mt-2 border-0">
                <div class="absolute left-0 flex items-center pt-2.5 pl-3 pointer-events-none">
                    <i class="text-stone-600 fi fi-sr-envelope"></i>
                </div>
                <x-input-company id="email" name="email" type="email" :value="old('email')" required
                    placeholder="Ingresar correo" class="block w-full" />

                <div id='linea' class='relative w-full h-1 border-0 border-b border-indigo-900 mb-0.5'>
                </div>

                <div class="absolute flex items-center pt-2.5 pl-3 pointer-events-d-none">
                    <i class="text-stone-600 fi fi-sr-lock"></i>
                </div>
                <div x-data="{ show: false }" class="relative">
                    <x-input-company id="password" name="password" x-bind:type="show ? 'text' : 'password'"
                        autocomplete="current-password" required placeholder="Ingresar contraseña"
                        class="block w-full pr-10" />

                    <div class="absolute inset-y-0 right-0 flex items-center pl-3 mt-1 cursor-pointer"
                        @click="show = !show">
                        <!-- Ícono de ojo normal (contraseña oculta) -->
                        <span x-show="!show" class="icon-eye" data-target="password">
                            <i class="text-stone-600 fi fi-sr-eye"></i>
                        </span>

                        <!-- Ícono de ojo tachado (contraseña visible) -->
                        <span x-show="show" class="icon-eye" data-target="password">
                            <i class="text-stone-600 fi fi-sr-eye-crossed"></i>
                        </span>
                    </div>
                </div>

            </div>
            <div class="flex items-center justify-between mt-5 text-[13.5px]">
                @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}"
                    class="font-semibold text-indigo-700 hover:underline hover:text-indigo-600 text-[13.5px]">
                    {{ __('Forgot your password?') }}
                </a>
                @endif
                <label for="remember_me" class="inline-flex items-center ml-4">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="text-[14px] text-stone-950 ms-2">{{ __('Remember me') }}</span>
                </label>
            </div>
            <x-auth-company-button type="submit" class="w-full mt-3">
                {{ __('Login') }}
            </x-auth-company-button>
        </form>
    </div>
</x-auth-layout>
