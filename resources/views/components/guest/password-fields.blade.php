<div x-data="passwordValidation()" class="space-y-4">

    <!-- Input contraseña -->
    <div x-data="{ show: false }" class="relative">
        <x-input id="password" x-bind:type="show ? 'text' : 'password'" name="password" placeholder="{{ __('Password') }}"
            x-model="password" @focus="showRules = true" @blur="hideRules()" />

        <button type="button" class="absolute -translate-y-1/2 right-5 top-1/2 focus:outline-none"
            @click="show = !show">
            <x-icon name="eye" class="w-5 h-5" x-show="!show" />
            <x-icon name="eye-off" class="w-5 h-5" x-show="show" />
        </button>

        <!-- Dropdown reglas -->
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

    <!-- Input confirmación -->
    <div x-data="{ show: false }" class="relative">
        <x-input id="password_confirmation" x-bind:type="show ? 'text' : 'password'" name="password_confirmation"
            placeholder="{{ __('Confirm Password') }}" x-model="confirmPassword" @focus="showConfirmRules = true"
            @blur="hideConfirmRules()" />

        <button type="button" class="absolute -translate-y-1/2 right-5 top-1/2 focus:outline-none"
            @click="show = !show">
            <x-icon name="eye" class="w-5 h-5" x-show="!show" />
            <x-icon name="eye-off" class="w-5 h-5" x-show="show" />
        </button>

        <!-- Dropdown confirmación -->
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
