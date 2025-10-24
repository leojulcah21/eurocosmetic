<x-app-layout>
    <x-slot name="header">
        <h6 class="mb-0 text-[17px] font-[600] capitalize text-stone-950 tracking-wider">
            {{ __('Employees') }}
        </h6>
    </x-slot>
    <x-app.section class="p-8" :title="__('Employee Management')"
        :description="__('Here you can create, delete, or edit information for each employee type. Just go to the corresponding page.')">
        <div class="p-6 bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
            <div class="flex items-center justify-between mb-5 text-gray-500">
                <h2 class="mb-2 text-xl font-semibold">Vendedores</h2>
                <a href="{{ route('company.employees.sellers.index') }}"
                    class="p-6 transition bg-white shadow rounded-2xl hover:shadow-lg">
                    <p class="text-stone-600">Gestiona todos los vendedores registrados.</p>
                </a>
            </div>
        </div>
        <a href="#" class="p-6 transition bg-white shadow rounded-2xl hover:shadow-lg">
            <h2 class="mb-2 text-xl font-semibold">Cobradores</h2>
            <p class="text-stone-600">Gestiona los cobradores de la empresa.</p>
        </a>
        <a href="{{ route('company.employees.whs-managers.index') }}" class="p-6 transition bg-white shadow rounded-2xl hover:shadow-lg">
            <h2 class="mb-2 text-xl font-semibold">Jefes de Almacén</h2>
            <p class="text-stone-600">Controla los responsables de almacén.</p>
        </a>
    </x-app.section>
</x-app-layout>
