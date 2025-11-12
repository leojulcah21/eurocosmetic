<div x-data="{photoName: null, photoPreview: null}" class='bg-[#fefefe] p-8 border-gray-200 border-[1px] border-solid rounded-3xl shadow-sm'>
    <h3 class='mx-0 mt-0 mb-5 text-base font-bold tracking-wider ps-1.5 uppercase underline'>
        {{ __('Profile Information')}}
    </h3>
    <div class='px-1.5'>
        <div class="flex flex-wrap mt-3 -mx-3">
            <div class="w-full max-w-full px-3 shrink-0 md:w-8/12 md:flex-0">
                <div class='grid grid-cols-7 gap-2'>
                    <!-- Name -->
                    <div class="col-span-4 mb-4">
                        <x-label for="name" value="{{ __('Name') }}" />
                        <x-input id="name" type="text" class="block w-full mt-[1px]" wire:model="state.name"
                            required autocomplete="name" />
                        <x-input-error for="name" class="mt-2" />
                    </div>

                    <!-- Username -->
                    <div class="col-span-3 mb-4">
                        <x-label for="username" value="{{ __('Username') }}" />
                        <x-input id="username" type="text" class="block w-full mt-[1px]" wire:model="state.username"
                            required autocomplete="name" />
                        <x-input-error for="username" class="mt-2" />
                    </div>
                </div>

                <div class="relative mb-4">
                    @php
                        $isVerified = auth()->user()->hasVerifiedEmail();
                    @endphp
                    <div class="absolute top-0 -right-1.5">
                        @if ($isVerified)
                            <x-badge class='px-6 py-1' color='green' variant='soft' icon="circle-dashed-check">
                                Verificado
                            </x-badge>
                        @else
                            <x-badge class='px-6 py-1' color='red' variant='soft' icon="circle-dashed-x">
                                No verificado
                            </x-badge>
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

            <!-- Profile photo -->
            <div class="items-center w-full max-w-full -mt-2.5 ps-3 shrink-0 md:w-4/12 md:flex-0">
                <div class="flex items-center justify-center mb-2">
                    @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                        <input type="file" id="photo" class="hidden" wire:model="photo" x-ref="photo" x-on:change="
                                photoName = $refs.photo.files[0].name;
                                const reader = new FileReader();
                                reader.onload = (e) => {
                                    photoPreview = e.target.result;
                                };
                                reader.readAsDataURL($refs.photo.files[0]);
                        " />
                        <div x-show="photoPreview" style="display: none;">
                            <img class="object-center border-4 border-solid rounded-full w-28 h-28 border-stone-200"
                                :src="photoPreview" alt="profile preview">
                        </div>
                        <div x-show="!photoPreview && {{ $this->user->profile_photo_path ? 'true' : 'false' }}">
                            <img class="object-center border-4 border-solid rounded-full w-28 h-28 border-stone-200"
                                src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}">
                        </div>
                        <div x-show="!photoPreview && {{ $this->user->profile_photo_path ? 'false' : 'true' }}">
                            <img class="object-center border-4 border-solid rounded-full w-28 h-28 border-stone-200"
                                src="{{ asset('img/user.png') }}" alt="profile image">
                        </div>
                    @endif
                </div>
                <div class="flex flex-col items-center justify-center gap-2 mt-2">
                    <button type="button"
                        class="hidden px-8 py-1.5 text-xs font-semibold leading-normal text-center text-white uppercase align-middle transition-all ease-in border-0 rounded-lg shadow-md cursor-pointer bg-gradient-to-br from-violet-600 via-indigo-600 to-indigo-500 lg:block tracking-wider hover:shadow-[0_7px_14px_rgba(50_50_93_.1),0_3px_6px_rgba(0_0_0_.08)] hover:-translate-y-px active:opacity-85"
                        x-on:click.prevent="$refs.photo.click()">
                        {{ __('Select a new photo') }}
                    </button>

                    <button type="button"
                        class="block px-8 py-1.5 text-xs font-semibold leading-normal text-center text-white align-middle transition-all ease-in border-0 rounded-lg shadow-md cursor-pointer bg-gradient-to-br from-violet-600 via-indigo-600 to-indigo-500 lg:hidden tracking-wider hover:shadow-[0_7px_14px_rgba(50_50_93_.1),0_3px_6px_rgba(0_0_0_.08)] hover:-translate-y-px active:opacity-85"
                        x-on:click.prevent="$refs.photo.click()">
                        <x-icon name='camera-plus' class="text-[9.5px]" />
                    </button>

                    @if ($this->user->profile_photo_path)
                        <button type="button"
                            class="hidden px-8 py-1.5 text-xs font-semibold leading-normal text-center text-white uppercase align-middle transition-all ease-in border-0 rounded-lg shadow-md cursor-pointer bg-gradient-to-br from-pink-600 via-red-600 to-red-500 lg:block tracking-wider hover:shadow-[0_7px_14px_rgba(50_50_93_.1),0_3px_6px_rgba(0_0_0_.08)] hover:-translate-y-px active:opacity-85"
                            wire:click="deleteProfilePhoto">
                            {{__('Remove photo') }}
                        </button>

                        <button type="button"
                            class="block px-8 py-1.5 text-xs font-semibold leading-normal text-center text-white align-middle transition-all ease-in border-0 rounded-lg shadow-md cursor-pointer bg-gradient-to-br from-pink-600 via-red-600 to-red-500 lg:hidden tracking-wider hover:shadow-[0_7px_14px_rgba(50_50_93_.1),0_3px_6px_rgba(0_0_0_.08)] hover:-translate-y-px active:opacity-85"
                            wire:click="deleteProfilePhoto">
                            <x-icon name='camera-x' class="text-[9.5px]" />
                        </button>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="h-px mx-0 my-4 bg-transparent border-0 opacity-25 bg-gradient-to-r from-transparent via-black/40 to-transparent"/>
    </div>

    <h3 class='mx-0 mt-0 mb-5 text-base font-bold tracking-wider ps-1.5 uppercase underline'>
        {{ __('Personal Information')}}
    </h3>
    <div class='px-1.5'>
        <div class="flex flex-wrap mt-3 -mx-3">
            <!-- Name -->
            <div class="w-full max-w-full px-3 shrink-0 md:w-4/12 md:flex-0">
                <div class="mb-4">
                    <x-label for="dni" value="{{ __('DNI') }}" />
                    <x-input id="dni" type="text" class="block w-full mt-[1px]" required autocomplete="dni" wire:model.defer="state.dni" />
                    <x-input-error for="dni" class="mt-2" />
                </div>
            </div>

            <div class="w-full max-w-full px-3 shrink-0 md:w-4/12 md:flex-0">
                <div class="mb-4">
                    <x-label for="phone" value="{{ __('Phone Number') }}" />
                    <x-input id="phone" type="text" class="block w-full mt-[1px]" required autocomplete="phone" wire:model.defer="state.phone" />
                    <x-input-error for="phone" class="mt-2" />
                </div>
            </div>

            <div class="w-full max-w-full px-3 shrink-0 md:w-4/12 md:flex-0" wire:ignore>
                <div class="mb-4">
                    <x-label for="birth_date" value="{{ __('Birthdate') }}" />
                    <x-datepicker id="birth_date" name="birth_date" class="block w-full mt-[1px]" required autocomplete="birth_date"
                        value="{{ old('birth_date', $state['birth_date'] ?? '') }}"
                    />
                    <x-input-error for="birth_date" class="mt-2" />
                </div>
            </div>
        </div>
        <div class='flex items-center mt-3 font-bold ms-auto'>
            <x-action-message class="me-3" on="saved">
                {{ __('Saved.') }}
            </x-action-message>
            <x-button variant="gradient" color="dark" shadow="md" wire:loading.attr="disabled" wire:target="photoCard" class='py-1'>
                {{ __('Save') }}
            </x-button>
        </div>
    </div>
</div>

<script>
    document.addEventListener('livewire:init', () => {
        Livewire.on('profileUpdated', () => {
            Swal.fire({
                icon: 'success',
                title: '¡Datos actualizados!',
                text: 'Tu perfil se ha guardado correctamente.',
                confirmButtonText: 'Entendido',
                confirmButtonColor: '#4f46e5',
                timer: 2500,
                timerProgressBar: true,
            });
        });
    });
</script>

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
