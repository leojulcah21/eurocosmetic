@props([
    'variant' => 'primary',
    'active' => false,
])

@php
    $variants = [
        'primary' => [
            'default' => [
                'p1' => 'text-stone-400 group-hover:text-indigo-500',
                'p2' => 'text-stone-300 group-hover:text-indigo-300',
                'p3' => 'text-stone-200 group-hover:text-indigo-200'
            ],
            'active' => [
                'p1' => 'text-indigo-500 group-hover:text-indigo-600',
                'p2' => 'text-indigo-400 group-hover:text-indigo-500',
                'p2' => 'text-indigo-300 group-hover:text-indigo-400'
            ]
        ],
        'secondary' => [
            'default' => [
                'p1' => 'text-stone-400 group-hover:text-gray-500',
                'p2' => 'text-stone-300 group-hover:text-gray-400',
                'p3' => 'text-stone-200 group-hover:text-gray-300'
            ],
            'active' => [
                'p1' => 'text-gray-500',
                'p2' => 'text-gray-400',
                'p3' => 'text-gray-200'
            ]
        ],
        'danger' => [
            'default' => [
                'p1' => 'text-stone-400 group-hover:text-red-500',
                'p2' => 'text-stone-300 group-hover:text-red-400',
                'p3' => 'text-stone-200 group-hover:text-red-300'
            ],
            'active' => [
                'p1' => 'text-red-600',
                'p2' => 'text-red-500',
                'p3' => 'text-red-300'
            ]
        ],
        'warning' => [
            'default' => [
                'p1' => 'text-stone-400 group-hover:text-yellow-400',
                'p2' => 'text-stone-300 group-hover:text-yellow-300',
                'p3' => 'text-stone-200 group-hover:text-yellow-200'
            ],
            'active' => [
                'p1' => 'text-yellow-500',
                'p2' => 'text-yellow-300',
                'p3' => 'text-yellow-200'
            ]
        ],
    ];

    $colors = $active
    ? $variants[$variant]['active']
    : $variants[$variant]['default'];
@endphp


<div {{ $attributes->merge(['class' => 'flex items-center']) }}>
    <svg version="1.0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" preserveAspectRatio="xMidYMid meet"  class="w-[14px] h-[14px] fill-current mt-[2px]">
        <g transform="translate(0,512) scale(0.1,-0.1)" stroke="none">
            <path d="M3086 5097 c-21 -12 -47 -38 -57 -57 -18 -34 -19 -118 -19 -2480 0 -2362 1 -2446 19 -2480 21 -40 83 -80 125 -80 33 0 1828 591 1888 621 24 12 45 34 58 59 20 39 20 55 20 1730 0 1679 0 1691 -20 1731 -14 27 -36 47 -68 65 -26 14 -449 225 -941 470 -688 342 -902 444 -930 444 -20 0 -54 -10 -75 -23z m744 -2107 c26 -13 47 -34 60 -60 19 -37 20 -58 20 -370 0 -312 -1 -333 -20 -370 -23 -45 -80 -80 -131 -80 -46 0 -108 39 -130 82 -18 34 -19 62 -19 370 1 375 2 379 76 424 48 29 92 30 144 4z" class="{{ $colors['p1'] }}"/>
            <path d="M1476 4196 c-70 -42 -75 -62 -76 -301 l0 -210 526 -394 c289 -217 541 -413 561 -435 83 -95 126 -243 106 -361 -14 -79 -58 -176 -106 -231 -20 -22 -272 -218 -561 -435 l-526 -394 0 -358 c0 -406 1 -411 78 -455 l40 -22 596 0 596 0 0 1810 0 1810 -597 0 -598 0 -39 -24z" class="{{ $colors['p2'] }}"/>
            <path d="M876 3588 c-72 -42 -76 -60 -76 -335 l0 -243 -341 0 c-492 0 -459 33 -459 -450 0 -376 2 -385 78 -428 39 -22 46 -22 381 -22 l341 0 0 -243 c0 -217 2 -246 19 -277 35 -68 127 -98 193 -64 17 9 306 223 643 475 642 482 645 484 645 559 0 75 -2 77 -661 571 -595 446 -632 472 -677 476 -36 3 -56 -2 -86 -19z"  class="{{ $colors['p3'] }}"/>
        </g>
    </svg>
</div>
