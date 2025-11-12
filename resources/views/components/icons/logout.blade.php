@props([
    'variant' => 'primary',
    'active' => false,
    'classIcon' => ''
])

@php
    $variants = [
        'primary' => [
            'default' => [
                'p1' => 'text-stone-400 group-hover:text-indigo-400',
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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-[14px] h-[14px] fill-current mt-[2px] {{ $classIcon }}" aria-hidden="true"
        preserveAspectRatio="xMidYMid meet">
        <g transform="translate(0,512) scale(0.1,-0.1)" stroke="none">
            <path d="M214 5090 c-60 -34 -126 -105 -160 -172 -57 -112 -54 -9 -54 -1955 0
                     -1290 3 -1807 11 -1845 17 -79 64 -165 123 -222 34 -34 251 -178 665 -439 337
                     -214 630 -397 652 -408 168 -88 378 -52 519 90 31 31 66 77 79 104 53 110 51
                     17 51 1922 0 1937 3 1832 -57 1935 -41 69 -110 138 -183 180 -49 29 -1589 840
                     -1594 840 -1 0 -24 -13 -52 -30z m1206 -2100 c26 -13 47 -34 60 -60 19 -37 20
                     -58 20 -370 0 -312 -1 -333 -20 -370 -23 -45 -80 -80 -130 -80 -50 0 -107 35
                     -130 80 -19 37 -20 58 -20 370 0 312 1 333 20 370 37 73 124 99 200 60z"
                  class="{{ $colors['p1'] }}" />
            <path d="M921 5116 c2 -2 243 -128 534 -281 292 -153 555 -294 585 -313 129
                     -82 222 -185 285 -317 67 -141 68 -146 72 -617 l4 -428 450 0 449 0 0 769 c0
                     481 -4 788 -10 822 -34 180 -179 325 -359 359 -49 9 -2021 16 -2010 6z"
                  class="{{ $colors['p3'] }}" />
            <path d="M3834 3441 c-31 -14 -47 -30 -63 -63 -20 -41 -21 -59 -21 -281 l0
                     -237 -615 0 c-597 0 -617 -1 -655 -20 -70 -36 -80 -70 -80 -280 0 -210 10
                     -244 80 -280 38 -19 58 -20 655 -20 l615 0 0 -238 c0 -231 1 -240 23 -283 29
                     -53 93 -86 149 -75 42 8 1141 771 1173 813 14 20 20 43 20 83 0 40 -6 63 -20
                     82 -20 27 -1066 765 -1135 800 -43 23 -74 22 -126 -1z"
                  class="{{ $colors['p2'] }}" />
            <path d="M2400 1280 l0 -680 239 0 c131 0 262 5 292 10 180 34 325 179 359
                     359 6 32 10 245 10 522 l0 469 -450 0 -450 0 0 -680z"
                  class="{{ $colors['p3'] }}" />
        </g>
    </svg>
</div>
