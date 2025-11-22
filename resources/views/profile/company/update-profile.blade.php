<div class='flex flex-wrap -mx-3'>
    <div class='w-full max-w-full px-3 shrink-0 md:w-8/12 md:flex-[0_0_auto]'>
        <div
            class="relative flex flex-col min-w-0 px-2 pt-1 break-words bg-white border-0 shadow-xl rounded-2xl bg-clip-border">
            <div class='p-3'>
                <div class="pt-6 px-6 pb-0 border-b-0 border-solid border-[rgb(0_0_0/0.125)] rounded-t-2xl">
                    <div class="flex items-center justify-between">
                        <p class="mb-0 -mt-5 text-lg font-bold text-stone-800">{{ __('Edit Profile') }}</p>
                        <div class='flex items-center font-bold ms-auto'>
                            <x-action-message class="me-3" on="saved">
                                {{ __('Saved.') }}
                            </x-action-message>
                            <x-button variant="gradient" color="primary" shadow="glow" wire:loading.attr="disabled" wire:target="photoCard" class='inline-block'>
                                {{ __('Save') }}
                            </x-button>
                        </div>
                    </div>
                </div>

                <div class='flex-auto px-6 pt-3 pb-6'>
                    <p class="font-bold leading-normal uppercase text-[13px] text-stone-700 underline">
                        {{ __('Profile Information')}}
                    </p>
                    <div class="flex flex-wrap mt-3 -mx-3">
                        <!-- Name -->
                        <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                            <div class="mb-4">
                                <x-label for="name" value="{{ __('Name') }}" />
                                <x-input id="name" type="text" class="block w-full mt-[1px]" wire:model="state.name"
                                    required autocomplete="name" />
                                <x-input-error for="name" class="mt-2" />
                            </div>
                        </div>

                        <!-- Username -->
                        <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                            <div class="mb-4">
                                <x-label for="username" value="{{ __('Username') }}" />
                                <x-input id="username" type="text" class="block w-full mt-[1px]" wire:model="state.username"
                                    required autocomplete="name" />
                                <x-input-error for="username" class="mt-2" />
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="w-full max-w-full px-3 shrink-0 md:w-full md:flex-0">
                            <div class="relative mb-4">
                                @php
                                    $isVerified = auth()->user()->hasVerifiedEmail();
                                @endphp
                                <div class="absolute top-0 -right-1.5">
                                    @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::emailVerification()) && !$this->user->hasVerifiedEmail())
                                        @if ($isVerified)
                                            <x-badge class='px-6 py-1' color='green' variant='soft' icon="circle-dashed-check">
                                                Verificado
                                            </x-badge>
                                        @else
                                            <x-badge class='px-6 py-1' color='red' variant='soft' icon="circle-dashed-x">
                                                No verificado
                                            </x-badge>
                                        @endif
                                    @endif
                                </div>
                                <x-label for="email" value="{{ __('Email') }}" />
                                <x-input id="email" type="email" class="block w-full mt-[1px]" wire:model="state.email"
                                    required autocomplete="username" />
                                <x-input-error for="email" class="mt-2" />

                                @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::emailVerification()) && !$this->user->hasVerifiedEmail())
                                    <p class="mt-2 text-sm">
                                        {{ __('Your email address is unverified.') }}

                                        <button type="button"
                                            class="text-sm text-gray-600 underline rounded-md hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                            wire:click.prevent="sendEmailVerification">
                                            {{ __('Click here to re-send the verification email.') }}
                                        </button>
                                    </p>

                                    @if ($this->verificationLinkSent)
                                        <p class="mt-2 text-sm font-medium text-green-600">
                                            {{ __('A new verification link has been sent to your email address.') }}
                                        </p>
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Profile Photo -->
    <div x-data="{photoName: null, photoPreview: null}"
        class="w-full max-w-full px-3 mt-6 shrink-0 md:w-4/12 md:flex-[0_0_auto] md:mt-0" x-cloak>
        <div
            class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
            <img class="w-full rounded-t-2xl" src="{{ asset('img/bg-profile.jpg') }}" alt="profile cover image">
            <div class="flex flex-wrap justify-center -mx-3">
                <div class="w-4/12 max-w-full px-3 flex-0 ">
                    @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                        <div class="mb-6 -mt-6 lg:mb-0 lg:-mt-16">
                            <input type="file" id="photo" class="hidden" wire:model="photo" x-ref="photo" x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                            " />
                            <div x-show="photoPreview" style="display: none;">
                                <img class="object-center h-auto max-w-full border-2 border-white border-solid rounded-full"
                                    :src="photoPreview" alt="profile preview">
                            </div>
                            <div x-show="!photoPreview && {{ $this->user->profile_photo_path ? 'true' : 'false' }}">
                                <img class="object-center h-auto max-w-full border-2 border-white border-solid rounded-full"
                                    src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}">
                            </div>
                            <div x-show="!photoPreview && {{ $this->user->profile_photo_path ? 'false' : 'true' }}">
                                <img class="object-center h-auto max-w-full border-2 border-white border-solid rounded-full"
                                    src="{{ asset('img/users/user.png') }}" alt="profile image">
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            <div class="p-6 pt-0 pb-6 text-center border-stone-500 rounded-t-2xl lg:pt-2 lg:pb-4">
                <div class="flex justify-between">
                    <button type="button"
                        class="hidden px-8 py-2.5 text-xs font-bold leading-normal text-center text-white uppercase align-middle transition-all ease-in border-0 rounded-lg shadow-md cursor-pointer bg-cyan-500 lg:block tracking-wider hover:shadow-[0_7px_14px_rgba(50_50_93_.1),0_3px_6px_rgba(0_0_0_.08)] hover:-translate-y-px active:opacity-85"
                        x-on:click.prevent="$refs.photo.click()">
                        {{ __('Select a new photo') }}
                    </button>

                    <button type="button"
                        class="block px-8 py-2.5 text-xs font-bold leading-normal text-center text-white align-middle transition-all ease-in border-0 rounded-lg shadow-md cursor-pointer bg-cyan-500 lg:hidden tracking-wider hover:shadow-[0_7px_14px_rgba(50_50_93_.1),0_3px_6px_rgba(0_0_0_.08)] hover:-translate-y-px active:opacity-85"
                        x-on:click.prevent="$refs.photo.click()">
                        <x-icon name='camera-plus' class="text-2.8" />
                    </button>
                    @if ($this->user->profile_photo_path)
                        <button type="button"
                            class="hidden px-8 py-2.5 text-xs font-bold leading-normal text-center text-white uppercase align-middle transition-all ease-in border-0 rounded-lg shadow-md cursor-pointer bg-slate-700 lg:block tracking-wider hover:shadow-[0_7px_14px_rgba(50_50_93_.1),0_3px_6px_rgba(0_0_0_.08)] hover:-translate-y-px active:opacity-85"
                            wire:click="deleteProfilePhoto">
                            {{__('Remove photo') }}
                        </button>
                        <button type="button"
                            class="block px-8 py-2.5 text-xs font-bold leading-normal text-center text-white align-middle transition-all ease-in border-0 rounded-lg shadow-md cursor-pointer bg-slate-700 lg:hidden tracking-wider hover:shadow-[0_7px_14px_rgba(50_50_93_.1),0_3px_6px_rgba(0_0_0_.08)] hover:-translate-y-px active:opacity-85"
                            wire:click="deleteProfilePhoto">
                            <x-icon name='camera-x' class="text-2.8" />
                        </button>
                    @endif
                </div>
            </div>

            <div class="flex-auto p-6 pt-0 mb-3">
                <div class="text-center t-6 ">
                    <h5 class="text-[18px] font-semibold text-stone-700">
                        {{ Auth::user()->name }},
                        <span class="font-light"> 22</span>
                    </h5>
                    <div class="relative mb-2 text-sm font-semibold leading-relaxed text-stone-700">
                        <x-icon name='mailbox' class="absolute w-[18px] h-[18px] mr-2 left-[110px] top-[2.2px]" />
                        {{ Auth::user()->email }}
                    </div>
                    <div class="relative mt-5 mb-2 text-sm font-semibold leading-relaxed text-stone-700">
                        <x-icon name='user-star' class="absolute w-[18px] h-[18px] mr-2 left-[92px] top-[2.2px]" />
                        Manager - Administrative Area
                    </div>
                    <div class="relative text-stone-600">
                        <x-icon name='building-skyscraper'
                            class="absolute w-[18px] h-[18px] mr-2 left-[101px] top-[3.5px] text-stone-600" />
                        {{ __('Corporation') }} Eurocosmetic
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@if (session('email_verified'))
    <script>
        Swal.fire({
            icon: 'success',
            title: '¡Correo verificado!',
            text: 'Tu cuenta fue verificada correctamente.',
            timer: 3000,
            showConfirmButton: false
        });
    </script>
@endif
