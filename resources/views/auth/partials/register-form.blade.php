<!-- REGISTER -->
<form x-show="isRegister" class="w-full transition-opacity duration-[1800ms] easy-in-out" method="POST"
    action="{{ route('register') }}">
    @csrf
    <h1 class='text-[30px] m-[-10px_0] font-bold text-center mb-2'>{{ __('Register') }}</h1>

    <div class='relative m-[20px_4px]'>
        <x-input id="name" class="block w-full mt-1" type="text" name="name" :value="old('name')" required
            autofocus autocomplete="name" placeholder="{{ __('Name') }}" />
        <i class='absolute text-lg -translate-y-1/2 bx bxs-user right-5 top-1/2'></i>
    </div>

    <div class='relative m-[20px_4px]'>
        <x-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')"
            required autocomplete="username" placeholder="{{ __('Email') }}" />
        <i class='absolute text-lg -translate-y-1/2 bx bxs-envelope right-5 top-1/2'></i>
    </div>

    <div class='relative m-[20px_4px]'>
        <x-input id="password" class="block w-full mt-1" type="password" name="password" required
            autocomplete="new-password" placeholder="{{ __('Password') }}" />
        <i class='absolute text-lg -translate-y-1/2 bx bxs-lock-alt right-5 top-1/2'></i>
    </div>

    <div class='relative m-[20px_4px]'>
        <x-input id="password_confirmation" class="block w-full mt-1" type="password"
            name="password_confirmation" required autocomplete="new-password"
            placeholder="{{ __('Confirm Password') }}" />
        <i class='absolute text-lg -translate-y-1/2 bx bxs-lock-alt right-5 top-1/2'></i>
    </div>

    @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
    <div class='relative mt-[20px] mb-[40px] mx-1'>
        <x-label for="terms">
            <div class="flex items-center">
                <x-checkbox name="terms" id="terms" required />
                <div class="text-base ms-2">
                    {!! __('I agree to the :terms_of_service and :privacy_policy', [
                    'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'"
                        class="text-base underline rounded-md text-stone-600 hover:text-stone-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                    'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'"
                        class="text-base underline rounded-md text-stone-600 hover:text-stone-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',]) !!}
                </div>
            </div>
        </x-label>
    </div>
    @endif

    <div class="text-center m-[-15px_0_15px]">
        <x-button>
            {{ __('Register') }}
        </x-button>
    </div>
</form>
