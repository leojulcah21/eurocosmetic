@props([
    'variant' => 'primary',
    'active' => false, // <- nuevo
])

@php
    $variants = [
        'primary' => [
            'default' => [
                // Estos ahora son p2 y p3 de tu primer ejemplo
                'p1' => 'text-gray-300 group-hover:text-cyan-300', // antes p2
                'p2' => 'text-gray-500 group-hover:text-sky-300',                // antes p3
            ],
            'active' => [
                'p1' => 'text-cyan-200 group-hover:text-cyan-300',
                'p2' => 'text-sky-400', // se mantiene fijo cuando está activo
            ],
        ],
        'secondary' => [
            'default' => [
                'p1' => 'text-gray-300 group-hover:text-gray-400',
                'p2' => 'group-hover:text-gray-500',
            ],
            'active' => [
                'p1' => 'text-gray-300 group-hover:text-gray-400',
                'p2' => 'text-gray-500',
            ],
        ],
        'danger' => [
            'default' => [
                'p1' => 'text-red-400 group-hover:text-red-500',
                'p2' => 'group-hover:text-red-600',
            ],
            'active' => [
                'p1' => 'text-red-400 group-hover:text-red-500',
                'p2' => 'text-red-600',
            ],
        ],
        'warning' => [
            'default' => [
                'p1' => 'text-yellow-400 group-hover:text-yellow-500',
                'p2' => 'group-hover:text-yellow-600',
            ],
            'active' => [
                'p1' => 'text-yellow-400 group-hover:text-yellow-500',
                'p2' => 'text-yellow-600',
            ],
        ],
        'black' => [
            'default' => [
                'p1' => 'text-black',
                'p2' => 'group-hover:text-black',
            ],
            'active' => [
                'p1' => 'text-black',
                'p2' => 'text-black',
            ],
        ],
        'white' => [
            'default' => [
                'p1' => 'text-white',
                'p2' => 'group-hover:text-white',
            ],
            'active' => [
                'p1' => 'text-white',
                'p2' => 'text-white',
            ],
        ],
    ];

    $colors = $active
        ? $variants[$variant]['active']
        : $variants[$variant]['default'];
@endphp

<div {{ $attributes->merge(['class' => 'flex items-center group']) }}>
    <svg class="w-4 h-4 -ml-1 fill-current" viewBox="0 0 24 24" fill="currentColor">
        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
        <path d="M12 2a5 5 0 1 1 -5 5l.005 -.217a5 5 0 0 1 4.995 -4.783z"
              class="{{ $colors['p1'] }}" />
        <path d="M14 14a5 5 0 0 1 5 5v1a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-1a5 5 0 0 1 5 -5h4z"
              class="{{ $colors['p2'] }}" />
    </svg>
</div>
