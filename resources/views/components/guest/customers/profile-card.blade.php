@php
    $user = Auth::user();
@endphp

<div>
    <x-slot name="header">
        {{ __('Account') }}
    </x-slot>
    <div class='text-stone-950 bg-[#fdfdfd] pb-[60px] px-0 overflow-clip scroll-mt-[90px]'>
        <div class='container relative py-2 mx-auto max-w-screen-2xl'>
            <div class='grid grid-cols-12 gap-6'>
                <div class='col-span-3'>
                    <div class='block h-full p-6 bg-white shadow-lg rounded-3xl'>
                        <div class='pb-6 mb-6 text-center border-b border-b-[rgba(0,0,0,0.06)]'>
                            <div class='relative w-24 h-24 mx-auto mt-0 mb-4'>
                                <img
                                    src="{{ $user->profile_photo_path
                                        ? $user->profile_photo_url
                                        : asset('img/user.png') }}"
                                    alt="{{ $user->name ?? 'profile image' }}"
                                    class="object-cover object-center w-full h-full rounded-[50%] border-4 border-solid border-white shadow-lg"
                                />

                                <span class='absolute bottom-0 right-0 w-8 h-8 bg-stone-950 rounded-[50%] flex items-center justify-center border-4 border-solid border-white'>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 text-white">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                        <path d="M3 21l18 0" />
                                        <path d="M3 7v1a3 3 0 0 0 6 0v-1m0 1a3 3 0 0 0 6 0v-1m0 1a3 3 0 0 0 6 0v-1h-18l2 -4h14l2 4" />
                                        <path d="M5 21l0 -10.15" />
                                        <path d="M19 21l0 -10.15" />
                                        <path d="M9 21v-4a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v4" />
                                    </svg>
                                </span>
                            </div>
                            <h4 class='mx-0 mt-0 mb-2 text-lg font-[600] text-stone-950'>{{ Auth::user()->name }}</h4>
                            <div class='inline-flex items-start gap-2 py-[6px] px-3 bg-yellow-100 rounded-[20px] text-[13px]'>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <path d="M17 3.34a10 10 0 1 1 -14.995 8.984l-.005 -.324l.005 -.324a10 10 0 0 1 14.995 -8.336zm-1.051 6.844a1 1 0 0 0 -1.152 -.663l-.113 .03l-2.684 .895l-2.684 -.895l-.113 -.03a1 1 0 0 0 -.628 1.884l.109 .044l2.316 .771v.976l-1.832 2.75l-.06 .1a1 1 0 0 0 .237 1.21l.1 .076l.101 .06a1 1 0 0 0 1.21 -.237l.076 -.1l1.168 -1.752l1.168 1.752l.07 .093a1 1 0 0 0 1.653 -1.102l-.059 -.1l-1.832 -2.75v-.977l2.316 -.771l.109 -.044a1 1 0 0 0 .524 -1.221zm-3.949 -4.184a1.5 1.5 0 1 0 0 3a1.5 1.5 0 0 0 0 -3z" />
                                </svg>

                                <span> {{ __(Auth::user()->role->name) }}</span>
                            </div>
                        </div>
                        <nav>
                            <ul class="flex flex-col gap-2">
                                <li>
                                    <x-nav-y-link href="#orders">
                                        <i class="bi bi-box-seam me-3"></i>
                                        <span>My Orders</span>
                                        <span class="hidden">3</span>
                                    </x-nav-y-link>
                                </li>
                                <li>
                                    <x-nav-y-link href="#wishlist">
                                        <i class="bi bi-heart me-3"></i>
                                        <span>Wishlist</span>
                                        <span class="hidden">12</span>
                                    </x-nav-y-link>
                                </li>
                                <li>
                                    <x-nav-y-link href="#wallet">
                                        <i class="bi bi-wallet2 me-3"></i>
                                        <span>Payment Methods</span>
                                    </x-nav-y-link>
                                </li>
                                <li>
                                    <x-nav-y-link href="#reviews">
                                        <i class="bi bi-star me-3"></i>
                                        <span>My Reviews</span>
                                    </x-nav-y-link>
                                </li>
                                <li>
                                    <x-nav-y-link href="#addresses">
                                        <i class="bi bi-geo-alt me-3"></i>
                                        <span>Addresses</span>
                                    </x-nav-y-link>
                                </li>
                                <li class="nav-item">
                                    <x-nav-y-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                                        <i class="bi bi-gear me-3"></i>
                                        <span>{{ __('Account Settings') }}</span>
                                    </x-nav-y-link>
                                </li>
                            </ul>

                            <div class="pt-6 mt-8 border-t border-t-[rgba(0,0,0,0.06)]">
                                <x-nav-y-link href="#">
                                    <i class="bi bi-question-circle me-3"></i>
                                    <span>Help Center</span>
                                </x-nav-y-link>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    @php($role = Auth::user()?->role?->name)
                                    <input type="hidden" name="last_role" value="{{ $role ?? 'Customer' }}">

                                    <button type='submit' class="flex items-center w-full px-4 py-3 mb-1 text-base tracking-wider text-red-600 transition-all duration-300 ease-in-out rounded-xl hover:bg-red-50">
                                        <i class="bi bi-box-arrow-right me-3"></i>
                                        <span>{{ __('Log Out') }}</span>
                                    </button>
                                </form>
                            </div>
                        </nav>
                    </div>
                </div>
                <div class='col-span-9'>
                    <div class='block h-full p-6 bg-white shadow-lg rounded-3xl'>
                        {{ $slot }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
