@props([
    'variant' => 'primary',
    'active' => false,
])

@php
    $variants = [
        'primary' => [
            'default' => [
                'p1' => 'text-stone-300 group-hover:text-indigo-300',
                'p2' => 'text-stone-400 group-hover:text-indigo-400 group-hover:fill-indigo-500'
            ],
            'active' => [
                'p1' => 'text-indigo-300 group-hover:text-indigo-400',
                'p2' => 'text-indigo-400 fill-indigo-500 group-hover:text-indigo-500'
            ],
        ],
        'secondary' => [
            'default' => [
                'p1' => 'text-stone-300 group-hover:text-gray-300',
                'p2' => 'text-stone-400 group-hover:text-gray-400'
            ],
            'active' => [
                'p1' => 'text-gray-400 group-hover:text-gray-400',
                'p2' => 'text-gray-500'
            ],
        ],
        'danger' => [
            'default' => [
                'p1' => 'text-stone-300 group-hover:text-red-500',
                'p2' => 'text-stone-400 group-hover:text-red-500'
            ],
            'active' => [
                'p1' => 'text-red-400 group-hover:text-red-500',
                'p2' => 'text-red-500'
            ],
        ],
        'warning' => [
            'default' => [
                'p1' => 'text-stone-300 group-hover:text-yellow-500',
                'p2' => 'text-stone-400 group-hover:text-yellow-500'
            ],
            'active' => [
                'p1' => 'text-yellow-400 group-hover:text-yellow-500',
                'p2' => 'text-yellow-500',
            ],
        ],
    ];

    $colors = $active
        ? $variants[$variant]['active']
        : $variants[$variant]['default'];
@endphp

<div {{ $attributes->merge(['class' => 'flex items-center']) }}>
    <svg id="Layer_1" class="w-4 h-4 -ml-1 fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" data-name="Layer 1">
        <path
            d="m22 12.19-.723-.893-18.809.085-.468.807c-1.161.414-2 1.514-2 2.816v4c0 2.757 2.243 5 5 5h14c2.757 0 5-2.243 5-5v-4c0-1.302-.839-2.402-2-2.816z"
            opacity=".5"  class="{{ $colors['p2'] }}"/>
        <path
            d="m18.151.815c-.399-.555-1.05-.854-1.718-.818-.7.044-1.322.446-1.664 1.074-.769 1.411-1.53 1.936-2.808 1.936h-1.962c-4.746 0-6 3.925-6 6 0 .552.447 1 1 1h14c.553 0 1-.448 1-1v-1c0-2.893-.939-5.928-1.849-7.191z"
            opacity=".5"  class="{{ $colors['p1'] }}"/>
        <path
            d="m21 12.006c.352 0 .686.072 1 .184v-1.184c0-1.654-1.346-3-3-3h-14c-1.654 0-3 1.346-3 3v1.184c.314-.112.648-.184 1-.184z" />
    </svg>
</div>
