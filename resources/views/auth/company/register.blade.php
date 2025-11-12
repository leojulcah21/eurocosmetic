<x-auth-layout>
    <div class="sm:mx-auto sm:w-full sm:max-w-sm">
        <x-application-logo class="m-auto h-[295px] w-[295px]" />
    </div>
    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
        <x-validation-errors class="mb-4" />
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <input type="hidden" name="context" value="company">
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

                <x-guest.company.password-fields />

            </div>
            <div class="flex items-center justify-between mt-5 text-[13.5px]">
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
            </div>
            <x-auth-company-button type="submit" class="w-full mt-3">
                {{ __('Register') }}
            </x-auth-company-button>
        </form>
    </div>
</x-auth-layout>
