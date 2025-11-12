<div>
    @if (auth()->user()->hasRole('Customer'))
        <x-guest-layout>
            <x-guest.customers.user-actions-card>
                <x-slot name="title">
                    {{ __('Email address verification') }}
                </x-slot>

                <x-slot name="description">
                    {{ __('Before continuing, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
                </x-slot>

                @if (session('status') == 'verification-link-sent')
                    <div class="pt-2 mb-4 text-sm font-bold text-green-600">
                        {{ __('A new verification link has been sent to the email address you provided in your profile settings.') }}
                    </div>
                @endif

                <div class="flex items-center justify-center mt-6">
                    <form method="POST" action="{{ route('verification.send') }}">
                        @csrf

                        <div>
                            <x-button type="submit" variant="gradient" color="dark" shadow="glow" class='inline-block'>
                                {{ __('Resend Verification Email') }}
                            </x-button>
                        </div>
                    </form>
                </div>

                <x-slot name='links'>
                    <a href="{{ route('profile.show') }}" class="px-5 py-1.5 text-sm font-semibold text-white border-2 border-white rounded-lg hover:bg-stone-900">
                        {{ __('Edit Profile') }}
                    </a>

                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf

                        <button type="submit" class="px-5 py-2 text-sm font-semibold text-red-400 border-2 border-red-400 rounded-lg hover:bg-stone-900 ms-2">
                            {{ __('Log Out') }}
                        </button>
                    </form>
                </x-slot>
            </x-guest.customers.user-actions-card>
        </x-guest-layout>
    @endif
</div>
