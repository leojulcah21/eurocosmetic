@props(['class' => ''])
<div class="{{ $class }}">
    <x-dropdown-link class="flex items-center px-4 py-2 hover:bg-gray-100" href="{{ route('profile.show') }}">
        <i class="mr-2 bi bi-person-circle"></i> Mi Perfil
    </x-dropdown-link>
    <x-dropdown-link class="flex items-center px-4 py-2 hover:bg-gray-100" href="#">
        <i class="mr-2 bi bi-bag-check"></i> Mis Ordenes
    </x-dropdown-link>
    <x-dropdown-link class="flex items-center px-4 py-2 hover:bg-gray-100" href="#">
        <i class="mr-2 bi bi-gear"></i> Configuración
    </x-dropdown-link>
</div>
