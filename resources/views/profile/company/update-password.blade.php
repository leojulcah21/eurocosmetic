<div class='p-3'>
    <div class="pt-6 px-6 pb-0 border-b-0 border-solid border-[rgb(0_0_0/0.125)] rounded-t-2xl">
        <div class="flex items-center justify-between">
            <p class="mb-0 -mt-5 text-lg font-bold text-stone-800">{{ __('Update Password') }}</p>
            <div class='flex items-center font-bold ms-auto'>
                <x-action-message class="me-3" on="saved">
                    {{ __('Saved.') }}
                </x-action-message>
                <x-button variant="gradient" color="primary" shadow="glow" class='inline-block'>
                    {{ __('Save') }}
                </x-button>
            </div>
        </div>
    </div>
    <div class='flex-auto px-6 pt-3 pb-6'>
        <p class="font-bold leading-normal uppercase text-[13px] text-stone-700 underline">
            {{ __('Update Password')}}
        </p>
        <p class="pt-2 text-sm font-medium leading-normal text-stone-700">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
        <div x-data="passwordValidation()" class="flex flex-wrap mt-3 -mx-3">
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
            <div class="w-full max-w-full px-3 shrink-0 md:w-full md:flex-0">
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
                        class="absolute left-0 z-10 w-full p-3 mt-2 text-sm bg-white border shadow-lg rounded-xl">
                        <ul class="space-y-1">
                            <template x-for="rule in rules" :key="rule.text">
                                <li class="flex items-center space-x-2"
                                    :class="rule.check(password) ? 'text-green-600' : 'text-red-600'">
                                    <i :class="rule.check(password) ? 'bx bx-check' : 'bx bx-x'"></i>
                                    <span x-text="rule.text"></span>
                                </li>
                            </template>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Confirm Password -->
            <div x-data="{ show: false }" class="relative w-full max-w-full px-3 shrink-0 md:w-full md:flex-0">
                <div class="mb-4">
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
                        class="absolute left-0 z-10 w-full p-3 mt-2 text-sm bg-white border shadow-lg rounded-xl">
                        <ul class="space-y-1">
                            <li class="flex items-center space-x-2"
                                :class="password !== '' && password === confirmPassword ? 'text-green-600' : 'text-red-600'">
                                <i :class="password !== '' && password === confirmPassword ? 'bx bx-check' : 'bx bx-x'"></i>
                                <span>Las contraseñas coinciden</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
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
            { text: 'Al menos un carácter especial', check: pw => /[@$!%*#?&]/.test(pw) },
        ],
        hideRules() { setTimeout(() => this.showRules = false, 200); },
        hideConfirmRules() { setTimeout(() => this.showConfirmRules = false, 200); },
    }
}
</script>
