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
    <svg class="w-[14px] h-[14px] fill-current mt-[2px]" version="1.0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" preserveAspectRatio="xMidYMid meet">
        <g transform="translate(0,512) scale(0.1,-0.1)" stroke="none">
            <path d="M1962 4905 c-242 -44 -455 -155 -628 -329 -253 -254 -373 -581 -342
            -938 57 -676 676 -1165 1348 -1064 253 39 475 150 656 331 457 456 469 1181
            27 1646 -180 189 -403 309 -657 354 -106 18 -302 18 -404 0z" class='{{ $colors['p2'] }}'/>
            <path d="M4262 3729 c-38 -15 -75 -48 -99 -87 -22 -35 -23 -46 -23 -264 l0
            -227 -233 -3 -234 -3 -40 -28 c-113 -78 -114 -250 -1 -324 l41 -28 231 -5 231
            -5 5 -230 c6 -263 9 -276 88 -326 74 -47 173 -39 236 19 60 56 66 85 66 324
            l0 217 234 3 234 3 39 31 c124 98 103 279 -39 339 -30 12 -81 15 -253 15
            l-215 0 0 208 c0 223 -6 264 -47 313 -49 58 -153 86 -221 58z" class='{{ $colors['p3'] }}'/>
            <path d="M1690 2160 c-1170 -30 -1559 -186 -1662 -666 -18 -82 -22 -134 -22
            -304 -1 -127 4 -232 12 -275 73 -397 305 -570 877 -654 313 -46 631 -61 1275
            -61 801 0 1216 30 1524 110 486 125 651 368 633 933 -5 182 -20 270 -61 381
            -128 340 -494 484 -1341 525 -295 15 -887 20 -1235 11z" class='{{ $colors['p1'] }}'/>
        </g>
    </svg>
</div>
