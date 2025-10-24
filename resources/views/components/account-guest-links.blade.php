<div>
    <x-dropdown-link href="{{ route('login.client') }}"
        class="block w-full px-4 py-2 mb-2 text-center text-white rounded-full bg-stone-950 hover:bg-stone-900">
        {{ __('Login') }}
    </x-dropdown-link>
    <x-dropdown-link href="{{ route('register.client') }}"
        class="block w-full px-4 py-2 text-center border rounded-full text-stone-950 border-stone-950 hover:bg-stone-100">
        {{ __('Register') }}
    </x-dropdown-link>
</div>
