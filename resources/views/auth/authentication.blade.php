<x-guest-layout>
    <x-authentication-card>
        <x-validation-errors class="mb-4" />
        <div class="flex items-center justify-center w-full">
            @include('auth.partials.login-form')
        </div>
        <div class="flex items-center justify-center w-full">
            @include('auth.partials.register-form')
        </div>
    </x-authentication-card>
</x-guest-layout>
