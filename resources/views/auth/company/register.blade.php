<x-auth-layout>
    <div class="sm:mx-auto sm:w-full sm:max-w-sm">
        <x-application-logo class="m-auto h-[295px] w-[295px]" />
    </div>
    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
        <x-validation-errors class="mb-4" />
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="relative mt-2 border-0">
                <div class="absolute left-0 flex items-center pt-2.5 pl-3 pointer-events-none">
                    <i class="text-stone-600 fi fi-sr-envelope"></i>
                </div>
                <x-input-company id="name" name="name" type="text" :value="old('name')" required
                    placeholder="{{ __('Name') }}" class="block w-full" />

                <div id='linea' class='relative w-full h-1 border-0 border-b border-indigo-900 mb-0.5'>
                </div>

                <div class="absolute left-0 flex items-center pt-2.5 pl-3 pointer-events-none">
                    <i class="text-stone-600 fi fi-sr-envelope"></i>
                </div>
                <x-input-company id="email" name="email" type="email" :value="old('email')" required
                    placeholder="{{ __('Email') }}" class="block w-full" />

                <div id='linea' class='relative w-full h-1 border-0 border-b border-indigo-900 mb-0.5'>
                </div>

                <x-app.password-fields />

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
