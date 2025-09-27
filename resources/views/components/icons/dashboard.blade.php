@props([
    'variant' => 'primary',
    'active' => false,
])

@php
    // Colores tal como los definiste (usados cuando el enlace está ACTIVO)
    $colorsActive = match($variant) {
        'primary' => [
            'p1' => 'text-cyan-400 dark:fill-slate-600',
            'p2' => 'text-cyan-200 group-hover:text-cyan-300',
            'p3' => 'group-hover:text-sky-300',
        ],
        'secondary' => [
            'p1' => 'text-gray-400',
            'p2' => 'text-gray-300',
            'p3' => 'text-gray-500',
        ],
        'danger' => [
            'p1' => 'text-red-500',
            'p2' => 'text-red-400',
            'p3' => 'text-red-600',
        ],
        'warning' => [
            'p1' => 'text-yellow-500',
            'p2' => 'text-yellow-400',
            'p3' => 'text-yellow-600',
        ],
        'black' => [
            'p1' => 'text-black',
            'p2' => 'text-black',
            'p3' => 'text-black',
        ],
        'white' => [
            'p1' => 'text-white',
            'p2' => 'text-white',
            'p3' => 'text-white',
        ],
        default => [
            'p1' => 'text-cyan-400 dark:fill-slate-600',
            'p2' => 'text-cyan-200 group-hover:text-cyan-300',
            'p3' => 'group-hover:text-sky-300',
        ],
    };

    // Colores para el estado INACTIVO (base gris) + hover que activa el color de la variante.
    // Aquí respetamos el estilo que pediste: el color "real" aparece solo en hover si no está activo.
    $colorsHover = match($variant) {
        'primary' => [
            'p1' => 'text-gray-500 group-hover:text-cyan-400 dark:group-hover:fill-slate-600',
            'p2' => 'text-gray-400 group-hover:text-cyan-200',
            'p3' => 'text-gray-300 group-hover:text-sky-300',
        ],
        'secondary' => [
            'p1' => 'text-gray-300 group-hover:text-gray-400',
            'p2' => 'text-gray-300 group-hover:text-gray-300',
            'p3' => 'text-gray-300 group-hover:text-gray-500',
        ],
        'danger' => [
            'p1' => 'text-gray-300 group-hover:text-red-500',
            'p2' => 'text-gray-300 group-hover:text-red-400',
            'p3' => 'text-gray-300 group-hover:text-red-600',
        ],
        'warning' => [
            'p1' => 'text-gray-300 group-hover:text-yellow-500',
            'p2' => 'text-gray-300 group-hover:text-yellow-400',
            'p3' => 'text-gray-300 group-hover:text-yellow-600',
        ],
        'black' => [
            'p1' => 'text-gray-300 group-hover:text-black',
            'p2' => 'text-gray-300 group-hover:text-black',
            'p3' => 'text-gray-300 group-hover:text-black',
        ],
        'white' => [
            'p1' => 'text-gray-300 group-hover:text-white',
            'p2' => 'text-gray-300 group-hover:text-white',
            'p3' => 'text-gray-300 group-hover:text-white',
        ],
        default => [
            'p1' => 'text-gray-300 group-hover:text-cyan-400 dark:group-hover:fill-slate-600',
            'p2' => 'text-gray-300 group-hover:text-cyan-200',
            'p3' => 'text-gray-300 group-hover:text-sky-300',
        ],
    };

    // Elegimos la paleta que vamos a aplicar según si está activo o no.
    $colors = $active ? $colorsActive : $colorsHover;
@endphp

<div {{ $attributes->merge(['class' => 'flex items-center group']) }}>
    <svg class="w-6 h-6 -ml-1 fill-current" viewBox="0 0 24 24" fill="none" aria-hidden="true">
        <path d="M6 8a2 2 0 0 1 2-2h1a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2V8ZM6 15a2 2 0 0 1 2-2h1a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2v-1Z"
              class="{{ $colors['p1'] }}" />
        <path d="M13 8a2 2 0 0 1 2-2h1a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2V8Z"
              class="{{ $colors['p2'] }}" />
        <path d="M13 15a2 2 0 0 1 2-2h1a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-1Z"
              class="{{ $colors['p3'] }}" />
    </svg>
</div>
