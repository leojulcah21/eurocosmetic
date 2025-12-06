<x-guest-layout>
    <div class="max-w-3xl p-6 mx-auto mt-10 bg-white rounded-lg shadow-md">
        <h2 class="mb-4 text-2xl font-semibold text-stone-800">
            Completa tu perfil, {{ $user->name }}
        </h2>

        <form action="{{ route('customer.store') }}" method="POST" class="space-y-4">
            @csrf

            {{-- Datos personales --}}
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <x-label for='name' value="{{ __('Name') }}"/>
                    <x-input id='name' type="text" value="{{ $user->name }}" disabled class="mt-[1px]" />
                    <x-input-error for="name" class="mt-2" />
                </div>

                <div>
                    <x-label for='email' value="{{ __('Email') }}"/>
                    <x-input id='email' type="text" value="{{ $user->email }}" disabled
                         class="mt-[1px]" />
                    <x-input-error for="email" class="mt-2" />
                </div>

                <div>
                    <x-label for='dni' value="{{ __('DNI') }}"/>
                    <x-input id='dni' type="text" name="dni" value="{{ old('dni') }}" required
                         class="mt-[1px]" />
                    <x-input-error for="dni" class="mt-2" />
                </div>

                <div>
                    <x-label for='phone' value="{{ __('Télefono') }}"/>
                    <x-input id='phone' type="text" name="phone" value="{{ old('phone') }}" required
                         class="mt-[1px]" />
                    <x-input-error for="phone" class="mt-2" />
                </div>

                <div class='relative col-span-2'>
                    <div class="absolute flex items-center pointer-events-none inset-y-[52px] end-4 ps-3">
                        <svg class="w-4 h-4 text-stone-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                        </svg>
                    </div>
                    <x-label for='birth_date' value="{{ __('Fecha de Nacimiento') }}"/>
                    <x-badge class='px-6 py-0.5 absolute top-0 -right-1' color='yellow' variant='soft' icon="alert-triangle">
                        {{ __('Debes tener al menos 18 años.') }}
                    </x-badge>
                    <x-datepicker id='birth_date' type='text' name="birth_date" value="{{ old('birth_date') }}" required class="mt-[1px]" />
                    <x-input-error for="birth_date" class="mt-2" />
                </div>

            </div>

            {{-- Datos del salón / dirección --}}
            <h3 class="mt-6 mb-2 text-lg font-semibold text-stone-700">Dirección del salón</h3>

            <div class="grid grid-cols-3 gap-4">
                <div>
                    <x-label for='departamento' value="{{ __('Departamento') }}"/>
                    <select name="departamento_id" id="departamento" required
                        class="w-full px-4 pr-12 py-2 bg-[#f5f5f5] rounded-md border border-solid border-stone-200 text-sm text-[#333] placeholder-[#888] placeholder:font-normal focus:outline-none focus:ring-0 focus:border-stone-200 shadow-sm">
                        <option value="">Seleccione</option>
                        @foreach ($departamentos as $dep)
                            <option value="{{ $dep->id }}">{{ $dep->name }}</option>
                        @endforeach
                    </select>
                    <x-input-error for="departamento" class="mt-2" />
                </div>

                <div>
                    <x-label for='provincia' value="{{ __('Provincia') }}"/>
                    <select name="provincia_id" id="provincia" required
                        class="w-full px-4 pr-12 py-2 bg-[#f5f5f5] rounded-md border border-solid border-stone-200 text-sm text-[#333] placeholder-[#888] placeholder:font-normal focus:outline-none focus:ring-0 focus:border-stone-200 shadow-sm">
                        <option value="">Seleccione</option>
                    </select>
                    <x-input-error for="provincia" class="mt-2" />
                </div>

                <div>
                    <x-label for='distrito' value="{{ __('Distrito') }}"/>
                    <select name="district_id" id="distrito" required
                        class="w-full px-4 pr-12 py-2 bg-[#f5f5f5] rounded-md border border-solid border-stone-200 text-sm text-[#333] placeholder-[#888] placeholder:font-normal focus:outline-none focus:ring-0 focus:border-stone-200 shadow-sm">
                        <option value="">Seleccione</option>
                    </select>
                    <x-input-error for="distrito" class="mt-2" />
                </div>
            </div>

            <div>
                <x-label for='address_detail' value="{{ __('Dirección Exacta') }}"/>
                <x-input id='address_detail' type="text" name="address_detail" value="{{ old('address_detail') }}" required class="mt-[1px]" />
                <x-input-error for="address_detail" class="mt-2" />
            </div>

            <div>
                <x-label for='reference' value="{{ __('Referencia') }}"/>
                <x-input id='reference' type="text" name="reference" value="{{ old('reference') }}" class="mt-[1px]" />
                <x-input-error for="reference" class="mt-2" />
            </div>

            <div>
                <x-label for='business_name' value="{{ __('Nombre del salón o empresa') }}"/>
                <x-input id='business_name' type="text" name="business_name" value="{{ old('business_name') }}" required class="mt-[1px]" />
                <x-input-error for="bussines_name" class="mt-2" />
            </div>

            {{-- Tipo de propiedad --}}
            <div>
                <x-label for='property_type' value="{{ __('Tipo de propiedad') }}" />
                <select id='property_type' name="property_type" required
                    class="w-full px-4 pr-12 py-2 bg-[#f5f5f5] rounded-md border border-solid border-stone-200 text-sm text-[#333] placeholder-[#888] placeholder:font-normal focus:outline-none focus:ring-0 focus:border-stone-200 shadow-sm">
                    <option value="rented" {{ old('property_type') == 'rented' ? 'selected' : '' }}>Alquilado</option>
                    <option value="owned" {{ old('property_type') == 'owned' ? 'selected' : '' }}>Propio</option>
                </select>
                <x-input-error for="property_type" class="mt-2" />
            </div>

            <div class="flex justify-end pt-4">
                <x-button variant="gradient" color="dark" shadow="glow" class='w-full'>
                    Guardar
                </x-button>
            </div>
        </form>
    </div>

    @if(session('success'))
        <script>
            Swal.fire({
                title: '¡Perfil completado!',
                text: "{{ session('success') }}",
                icon: 'success',
                confirmButtonColor: '#3085d6'
            })
        </script>
    @endif

    <script>
        // Datos precargados desde Blade
        const provincias = @json($provincias);
        const distritos = @json($distritos);

        const departamentoSelect = document.getElementById('departamento');
        const provinciaSelect = document.getElementById('provincia');
        const distritoSelect = document.getElementById('distrito');

        // Ocultar inicialmente
        provinciaSelect.parentElement.style.display = 'none';
        distritoSelect.parentElement.style.display = 'none';

        // Cuando cambia el departamento
        departamentoSelect.addEventListener('change', (e) => {
            const depId = e.target.value;
            provinciaSelect.innerHTML = '<option value="">Seleccione</option>';
            distritoSelect.innerHTML = '<option value="">Seleccione</option>';

            if (!depId) {
                provinciaSelect.parentElement.style.display = 'none';
                distritoSelect.parentElement.style.display = 'none';
                return;
            }

            // Filtrar provincias por departamento
            const provinciasFiltradas = provincias.filter(p => p.departament_id == depId);
            provinciasFiltradas.forEach(p => {
                const opt = document.createElement('option');
                opt.value = p.id;
                opt.textContent = p.name;
                provinciaSelect.appendChild(opt);
            });

            // Mostrar provincias, ocultar distritos
            provinciaSelect.parentElement.style.display = '';
            distritoSelect.parentElement.style.display = 'none';
        });

        // Cuando cambia la provincia
        provinciaSelect.addEventListener('change', (e) => {
            const provId = e.target.value;
            distritoSelect.innerHTML = '<option value="">Seleccione</option>';

            if (!provId) {
                distritoSelect.parentElement.style.display = 'none';
                return;
            }

            // Filtrar distritos por provincia
            const distritosFiltrados = distritos.filter(d => d.province_id == provId);
            distritosFiltrados.forEach(d => {
                const opt = document.createElement('option');
                opt.value = d.id;
                opt.textContent = d.name;
                distritoSelect.appendChild(opt);
            });

            // Mostrar distritos
            console.log({ provincias, distritos });
            distritoSelect.parentElement.style.display = '';
        });
    </script>
</x-guest-layout>

@if (session()->pull('email_verified'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Correo verificado correctamente',
        text: 'Ahora completa tu perfil para continuar.',
        confirmButtonColor: '#111827',
    });
</script>
@endif
