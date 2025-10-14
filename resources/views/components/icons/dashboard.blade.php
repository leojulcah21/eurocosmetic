@props([
    'variant' => 'primary',
    'active' => false,
])

@php
    $variants = [
        'primary' => [
            'default' => [
                'p1' => 'text-stone-400 group-hover:text-indigo-400 group-hover:fill-indigo-500',
                'p2' => 'text-stone-300 group-hover:text-indigo-300',
                'p3' => 'text-stone-200 group-hover:text-indigo-200',
                'p4' => 'text-stone-100 group-hover:text-indigo-100',
            ],
            'active' => [
                'p1' => 'text-indigo-500 fill-indigo-600 group-hover:text-indigo-600',
                'p2' => 'text-indigo-400 group-hover:text-indigo-500',
                'p3' => 'text-indigo-300 group-hover:text-indigo-400',
                'p4' => 'group-hover:text-indigo-200',
            ]
        ],
        'secondary' => [
            'default' => [
                'p1' => 'text-stone-400 group-hover:text-gray-500',
                'p2' => 'text-stone-300 group-hover:text-gray-400',
                'p3' => 'text-stone-200 group-hover:text-gray-300',
            ],
            'active' => [
                'p1' => 'text-gray-500',
                'p2' => 'text-gray-400',
                'p3' => 'text-gray-300',
            ]
        ],
        'danger' => [
            'default' => [
                'p1' => 'text-stone-400 group-hover:text-red-500',
                'p2' => 'text-stone-300 group-hover:text-red-400',
                'p3' => 'text-stone-200 group-hover:text-red-600',
            ],
            'active' => [
                'p1' => 'text-red-600',
                'p2' => 'text-red-500',
                'p3' => 'text-red-400',
            ]
        ],
        'warning' => [
            'default' => [
                'p1' => 'text-stone-400 group-hover:text-yellow-400',
                'p2' => 'text-stone-300 group-hover:text-yellow-300',
                'p3' => 'text-stone-200 group-hover:text-yellow-200',
            ],
            'active' => [
                'p1' => 'text-yellow-500',
                'p2' => 'text-yellow-300',
                'p3' => 'text-yellow-200',
            ]
        ],
    ];

    $colors = $active
        ? $variants[$variant]['active']
        : $variants[$variant]['default'];
@endphp

<div {{ $attributes->merge(['class' => 'flex items-center']) }}>
    <svg class="w-4 h-4 -ml-1 fill-current" viewBox="0 0 24 24" fill="none" aria-hidden="true">
        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
        <path
            d="M8 3a3 3 0 0 1 3 3v1a3 3 0 0 1 -3 3h-2a3 3 0 0 1 -3 -3v-1a3 3 0 0 1 3 -3z" class="{{ $colors['p1'] }}" />
        <path d="M8 12a3 3 0 0 1 3 3v3a3 3 0 0 1 -3 3h-2a3 3 0 0 1 -3 -3v-3a3 3 0 0 1 3 -3z" class="{{ $colors['p2'] }}" />
        <path d="M18 3a3 3 0 0 1 3 3v3a3 3 0 0 1 -3 3h-2a3 3 0 0 1 -3 -3v-3a3 3 0 0 1 3 -3z" class="{{ $colors['p3'] }}" />
        <path d="M18 14a3 3 0 0 1 3 3v1a3 3 0 0 1 -3 3h-2a3 3 0 0 1 -3 -3v-1a3 3 0 0 1 3 -3z" class="{{ $colors['p4'] }}" />
    </svg>
</div>
