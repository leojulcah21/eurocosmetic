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
    <svg class="w-[15px] h-[15px] -ml-1 fill-current" version="1.0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" preserveAspectRatio="xMidYMid meet">
        <g transform="translate(0,512) scale(0.1,-0.1)" stroke="none">
            <path d="M2017 4813 c-290 -169 -526 -311 -525 -315 2 -5 485 -287 1073 -627 902 -522 1073 -617 1090 -608 70 35 1065 610 1065 615 0 4 -238 142 -528 306 -290 165 -770 441 -1067 615 -297 173 -549 316 -560 318 -13 3 -213 -108 -548 -304z" class="{{ $colors['p2'] }}"/>
            <path d="M878 4157 c-263 -150 -478 -275 -478 -278 0 -4 486 -286 1079 -628 l1080 -621 475 273 c262 149 476 275 476 278 0 6 -2145 1250 -2152 1249 -2 -1 -218 -123 -480 -273z" class="{{ $colors['p3'] }}"/>
            <path d="M330 3160 l0 -611 386 -822 c213 -452 397 -843 410 -869 19 -38 37 -54 91 -86 38 -21 338 -196 667 -388 330 -192 603 -351 608 -352 4 -2 8 558 8 1245 l0 1248 -1079 623 c-593 342 -1082 622 -1085 622 -3 0 -6 -275 -6 -610z m1548 -1726 c174 -103 325 -195 335 -206 9 -11 17 -29 17 -39 0 -24 -34 -59 -57 -59 -22 0 -663 375 -680 397 -29 37 -2 93 44 93 13 0 166 -84 341 -186z m8 -386 c211 -125 330 -201 337 -216 14 -30 -5 -70 -37 -78 -18 -4 -40 2 -73 21 -356 205 -601 352 -615 368 -10 10 -18 28 -18 38 0 25 35 59 60 59 11 0 167 -87 346 -192z" class="{{ $colors['p1'] }}"/>
            <path d="M4238 3458 l-538 -311 0 -348 c0 -336 -1 -350 -20 -369 -24 -24 -48 -25 -78 -4 -22 15 -22 16 -22 331 0 284 -2 315 -16 309 -9 -3 -225 -126 -480 -273 l-464 -267 0 -1249 0 -1249 43 25 c23 13 249 145 502 292 253 147 717 414 1030 592 314 179 576 332 583 341 9 12 12 279 12 1254 0 681 -3 1238 -7 1237 -5 0 -250 -140 -545 -311z m-654 -1860 c22 -31 20 -51 -6 -75 -35 -31 -652 -393 -671 -393 -25 0 -57 36 -57 65 0 14 10 31 23 40 84 61 647 384 669 384 17 1 33 -7 42 -21z m-4 -378 c23 -23 26 -49 8 -72 -17 -20 -647 -391 -674 -396 -49 -9 -84 68 -46 100 9 9 136 85 282 170 146 86 288 169 315 186 59 36 88 39 115 12z" class="{{ $colors['p3'] }}"/>
            <path d="M330 1774 c0 -369 3 -484 13 -496 12 -16 609 -359 614 -354 3 3 -596 1278 -616 1313 -7 13 -10 -128 -11 -463z" class="{{ $colors['p2'] }}"/>
        </g>
    </svg>
</div>
