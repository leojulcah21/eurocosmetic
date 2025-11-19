<!-- LOGIN -->
<form x-show="!isRegister" id="loginForm" class="w-full transition-opacity duration-[1800ms] easy-in-out" method="POST"
    action="{{ route('login') }}">
    @csrf
    <input type="hidden" name="context" value="customer">
    <h1 class='text-[30px] m-[-10px_0] font-bold text-center mb-2'>{{ __('Login') }}</h1>

    <div class='relative m-[20px_4px]'>
        <x-input id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username"
            placeholder="{{ __('Email') }}" />
        <button type="button" class="absolute -translate-y-1/2 right-5 top-1/2 focus:outline-none">
            <x-icon name="envelope" class="w-5 h-5" />
        </button>
    </div>

    <div x-data="{ show: false }" class="relative m-[20px_4px]">
        <x-input id="password" x-bind:type="show ? 'text' : 'password'" name="password" required
            autocomplete="current-password" placeholder="{{ __('Password') }}" class="pr-10" />

        <button type="button" class="absolute -translate-y-1/2 right-5 top-1/2 focus:outline-none"
            @click="show = !show">
            <x-icon name="eye" class="w-5 h-5" x-show="!show" />
            <x-icon name="eye-off" class="w-5 h-5" x-show="show" />
        </button>
    </div>

    <div class='relative mt-[20px] mb-[40px] mx-1'>
        <label for="remember_me" class="flex items-center">
            <x-checkbox id="remember_me" name="remember" />
            <span class="text-base text-stone-900 ms-2">{{ __('Remember me') }}</span>
        </label>
    </div>

    <div class='text-center m-[-15px_0_15px]'>
        <div class='mb-3'>
            @if (Route::has('password.request'))
            <a class="text-[16px] rounded-md hover:underline text-stone-600 hover:text-stone-900 focus:outline-none focus:text-indigo-600"
                href="{{ route('password.request') }}">
                {{ __('Forgot your password?') }}
            </a>
            @endif
        </div>
        <x-button variant="gradient" color="dark" shadow='glow' class='w-full'>
            {{ __('Login') }}
        </x-button>
    </div>
</form>
