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
            ],
            'active' => [
                'p1' => 'text-indigo-500 fill-indigo-600 group-hover:text-indigo-600',
                'p2' => 'text-indigo-400 group-hover:text-indigo-500',
                'p3' => 'text-indigo-300 group-hover:text-indigo-400',
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
    <svg class="w-4 h-4 -ml-1 fill-current" version="1.0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" preserveAspectRatio="xMidYMid meet">
        <g transform="translate(0,512) scale(0.1,-0.1)" stroke="none">
            <path d="M1840 4036 c-526 -111 -859 -617 -751 -1141 136 -661 912 -975 1474 -597 293 199 459 556 417 902 -49 396 -328 720 -708 822 -99 26 -336 34 -432 14z" class="{{ $colors['p2'] }}"/>
            <path d="M3396 3829 c-100 -16 -220 -65 -296 -120 -49 -36 -49 -36 3 -154 61 -136 96 -307 97 -460 0 -162 -48 -372 -115 -505 -31 -61 -31 -73 -2 -100 36 -35 196 -107 274 -124 92 -20 234 -20 326 0 94 21 236 90 313 153 115 93 202 231 245 386 30 108 30 267 0 378 -58 218 -232 418 -437 501 -122 50 -279 67 -408 45z" class="{{ $colors['p2'] }}"/>
            <path d="M3133 2116 c-35 -16 -47 -43 -38 -85 8 -38 24 -51 130 -104 172 -85 298 -196 429 -374 108 -149 207 -225 331 -258 71 -18 486 -22 549 -4 51 14 121 80 142 135 25 67 15 129 -41 242 -41 83 -61 110 -139 187 -102 101 -176 145 -323 194 -181 61 -280 73 -663 77 -284 4 -351 2 -377 -10z" class="{{ $colors['p3'] }}"/>
            <path d="M1660 1909 c-610 -41 -967 -223 -1145 -584 -89 -182 -103 -264 -60 -352 29 -58 79 -97 145 -113 32 -8 457 -10 1455 -8 l1410 3 45 25 c101 57 136 174 90 303 -196 543 -627 741 -1600 735 -118 0 -271 -5 -340 -9z" class="{{ $colors['p1'] }}"/>
        </g>
    </svg>
</div>
