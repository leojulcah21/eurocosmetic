<div x-data="passwordValidation()" class='bg-[#fefefe] p-8 border-gray-200 border-[1px] border-solid rounded-3xl shadow-sm relative transition-all duration-700 ease-in-out'>
    <h3 class='mx-0 mt-0 mb-5 text-base font-bold tracking-wider ps-1.5 uppercase underline'>
        {{ __('Update Password')}}
    </h3>
    <div class='px-1.5'>
        <div class="flex flex-wrap mt-3 -mx-3">
            <!-- Current Password -->
            <div class="w-full max-w-full px-3 shrink-0 md:w-full md:flex-0">
                <div x-data="{ show: false }" class="mb-4">
                    <x-label for="current_password" value="{{ __('Current Password') }}" />
                    <div class="relative">
                        <x-input id="current_password" type="password" class="block w-full mt-1" wire:model="state.current_password" x-bind:type="show ? 'text' : 'password'" autocomplete="current-password" />
                        <button type="button" class="absolute -translate-y-1/2 right-4 top-1/2 focus:outline-none"
                            @click="show = !show">
                            <x-icon name="eye" class="w-5 h-5" x-show="!show" />
                            <x-icon name="eye-off" class="w-5 h-5" x-show="show" />
                        </button>
                    </div>
                    <x-input-error for="current_password" class="mt-2" />
                </div>
            </div>

            <!-- New Password -->
            <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                <div x-data="{ show: false }" class="mb-4">
                    <x-label for="password" value="{{ __('New Password') }}" />
                    <div class="relative">
                        <x-input id="password" type="password" class="block w-full mt-1" x-bind:type="show ? 'text' : 'password'" wire:model="state.password" autocomplete="new-password"
                        x-model="password" @focus="showRules = true" @blur="hideRules()"
                        />
                        <button type="button" class="absolute -translate-y-1/2 right-4 top-1/2 focus:outline-none"
                            @click="show = !show">
                            <x-icon name="eye" class="w-5 h-5" x-show="!show" />
                            <x-icon name="eye-off" class="w-5 h-5" x-show="show" />
                        </button>
                    </div>
                    <x-input-error for="password" class="mt-2" />
                    <div x-show="showRules" x-transition
                        class="z-10 w-full p-3 text-sm transition-all duration-700 ease-in-out rounded-xl">
                        <ul class="space-y-1">
                            <template x-for="rule in rules" :key="rule.text">
                                <li class="flex items-center space-x-2">
                                    <i class='text-base mt-0.5 font-bold' :class="rule.check(password) ? 'bx bx-check-circle text-green-600' : 'bx bx-x-circle text-red-600'"></i>
                                    <span x-text="rule.text" :class="rule.check(password) ? 'text-stone-900 line-through' : 'text-stone-600'"></span>
                                </li>
                            </template>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Confirm Password -->
            <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                <div x-data="{ show: false }" class="mb-4">
                    <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                    <div class="relative">
                        <x-input id="password_confirmation" type="password" class="block w-full mt-1" x-bind:type="show ? 'text' : 'password'" wire:model="state.password_confirmation" autocomplete="new-password" x-model="confirmPassword"
                        @focus="showConfirmRules = true"
                        @blur="hideConfirmRules()"/>
                        <button type="button" class="absolute -translate-y-1/2 right-4 top-1/2 focus:outline-none"
                            @click="show = !show">
                            <x-icon name="eye" class="w-5 h-5" x-show="!show" />
                            <x-icon name="eye-off" class="w-5 h-5" x-show="show" />
                        </button>
                    </div>
                    <x-input-error for="password_confirmation" class="mt-2" />
                    <div x-show="showConfirmRules" x-transition
                        class="z-10 w-full p-3 text-sm transition-all duration-700 ease-in-out rounded-xl">
                        <ul class="space-y-1">
                            <li class="flex items-center space-x-2">
                                <i class='text-base mt-0.5 font-bold' :class="password !== '' && password === confirmPassword ? 'bx bx-check text-green-600' : 'bx bx-x text-red-600'"></i>
                                <span x-text="password !== '' && password === confirmPassword
                                    ? 'Las contraseñas coinciden'
                                    : 'Las contraseñas no coinciden'"
                                    :class="password !== '' && password === confirmPassword ? 'text-stone-900 line-through' : 'text-stone-600'">
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class='flex items-center mt-3 font-bold ms-auto'>
            <x-action-message class="me-3" on="saved">
                {{ __('Saved.') }}
            </x-action-message>
            <x-button variant="gradient" color="dark" shadow="md" class='inline-block py-1'>
                {{ __('Save') }}
            </x-button>
        </div>
    </div>
</div>

<script>
    function passwordValidation() {
        return {
            password: '',
            confirmPassword: '',
            showRules: false,
            showConfirmRules: false,
            rules: [
                { text: 'Mínimo 8 caracteres', check: pw => pw.length >= 8 },
                { text: 'Al menos una mayúscula', check: pw => /[A-Z]/.test(pw) },
                { text: 'Al menos un número', check: pw => /[0-9]/.test(pw) },
                { text: 'Al menos un carácter especial (@$!%*#?&)', check: pw => /[@$!%*#?&]/.test(pw) },
            ],
            hideRules() { setTimeout(() => this.showRules = false, 200); },
            hideConfirmRules() { setTimeout(() => this.showConfirmRules = false, 200); },
        }
    }
</script>
