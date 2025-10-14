<div x-data="passwordValidation()" class="relative space-y-4">
    <div class="absolute flex items-center pt-2.5 pl-3 pointer-events-d-none">
        <i class="text-stone-600 fi fi-sr-lock"></i>
    </div>
    <!-- Input contraseña -->
    <div x-data="{ show: false }" class="relative">
        <x-input-company id="password" x-bind:type="show ? 'text' : 'password'" name="password"
            placeholder="{{ __('Password') }}" x-model="password" @focus="showRules = true" @blur="hideRules()" />

        <div class="absolute inset-y-0 right-0 flex items-center pl-3 mt-1 cursor-pointer" @click="show = !show">
            <!-- Ícono de ojo normal (contraseña oculta) -->
            <span x-show="!show" class="icon-eye" data-target="password">
                <i class="text-stone-600 fi fi-sr-eye"></i>
            </span>

            <!-- Ícono de ojo tachado (contraseña visible) -->
            <span x-show="show" class="icon-eye" data-target="password">
                <i class="text-stone-600 fi fi-sr-eye-crossed"></i>
            </span>
        </div>

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

    <div id='linea' class='relative w-full h-1 border-0 border-b border-indigo-900 mb-0.5'>
    </div>

    <div class="absolute flex items-center pt-2.5 pl-3 pointer-events-d-none">
        <i class="text-stone-600 fi fi-sr-lock"></i>
    </div>
    <!-- Input confirmación -->
    <div x-data="{ show: false }" class="relative">
        <x-input-company id="password_confirmation" x-bind:type="show ? 'text' : 'password'"
            name="password_confirmation" placeholder="{{ __('Confirm Password') }}" x-model="confirmPassword"
            @focus="showConfirmRules = true" @blur="hideConfirmRules()" />

        <div class="absolute inset-y-0 right-0 flex items-center pl-3 mt-1 cursor-pointer" @click="show = !show">
            <!-- Ícono de ojo normal (contraseña oculta) -->
            <span x-show="!show" class="icon-eye" data-target="password">
                <i class="text-stone-600 fi fi-sr-eye"></i>
            </span>

            <!-- Ícono de ojo tachado (contraseña visible) -->
            <span x-show="show" class="icon-eye" data-target="password">
                <i class="text-stone-600 fi fi-sr-eye-crossed"></i>
            </span>
        </div>

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
