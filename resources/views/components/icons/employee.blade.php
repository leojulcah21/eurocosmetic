@props([
    'variant' => 'primary',
    'active' => false,
])

@php
    $variants = [
        'primary' => [
            'default' => [
                'p1' => 'text-stone-300 group-hover:text-indigo-300',
                'p2' => 'text-stone-400 group-hover:text-indigo-400 group-hover:fill-indigo-500',
                'p3' => 'text-stone-500 group-hover:text-indigo-500 group-hover:fill-indigo-500',
            ],
            'active' => [
                'p1' => 'text-indigo-300 group-hover:text-indigo-400',
                'p2' => 'text-indigo-400 fill-indigo-500 group-hover:text-indigo-500',
                'p3' => 'text-indigo-500 fill-indigo-600 group-hover:text-indigo-600',
            ],
        ],
        'secondary' => [
            'default' => [
                'p1' => 'text-stone-300 group-hover:text-gray-300',
                'p2' => 'text-stone-400 group-hover:text-gray-400',
                'p3' => 'text-stone-500 group-hover:text-gray-500',
            ],
            'active' => [
                'p1' => 'text-gray-400 group-hover:text-gray-400',
                'p2' => 'text-gray-500',
                'p3' => 'text-gray-600',
            ],
        ],
        'danger' => [
            'default' => [
                'p1' => 'text-stone-300 group-hover:text-red-500',
                'p2' => 'text-stone-400 group-hover:text-red-500',
                'p3' => 'text-stone-500 group-hover:text-red-600',
            ],
            'active' => [
                'p1' => 'text-red-400 group-hover:text-red-500',
                'p2' => 'text-red-500',
                'p3' => 'text-red-600',
            ],
        ],
        'warning' => [
            'default' => [
                'p1' => 'text-stone-300 group-hover:text-yellow-500',
                'p2' => 'text-stone-400 group-hover:text-yellow-500',
                'p2' => 'text-stone-500 group-hover:text-yellow-600',
            ],
            'active' => [
                'p1' => 'text-yellow-400 group-hover:text-yellow-500',
                'p2' => 'text-yellow-500',
                'p3' => 'text-yellow-600',
            ],
        ],
    ];

    $colors = $active
        ? $variants[$variant]['active']
        : $variants[$variant]['default'];
@endphp


<div {{ $attributes->merge(['class' => 'flex items-center']) }}>
    <svg class="w-4 h-4 -ml-1 fill-current" fill="none" viewBox="0 0 24 24">
        <!--Boxicons v3.0 https://boxicons.com | License  https://docs.boxicons.com/free-->
        <path d="M9 4A4 4 0 1 0 9 12 4 4 0 1 0 9 4z"></path>
        <path d="m10,13h-2c-2.76,0-5,2.24-5,5v1c0,.55.45,1,1,1h10c.55,0,1-.45,1-1v-1c0-2.76-2.24-5-5-5Z" class="{{ $colors['p1'] }}" ></path>
        <path
            d="m15,4c-.47,0-.9.09-1.31.22.82,1.02,1.31,2.33,1.31,3.78s-.49,2.75-1.31,3.78c.41.13.84.22,1.31.22,2.28,0,4-1.72,4-4s-1.72-4-4-4Z" class="{{ $colors['p1'] }}" >
        </path>
        <path
            d="m16,13h-1.11c1.3,1.27,2.11,3.04,2.11,5v1c0,.35-.07.69-.18,1h3.18c.55,0,1-.45,1-1v-1c0-2.76-2.24-5-5-5Z" class="{{ $colors['p3'] }}" >
        </path>
    </svg>
</div>
