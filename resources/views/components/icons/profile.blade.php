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
            ],
            'active' => [
                'p1' => 'text-indigo-300 group-hover:text-indigo-400',
                'p2' => 'text-indigo-500 fill-indigo-600 group-hover:text-indigo-600',
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
    ];

    $colors = $active
        ? $variants[$variant]['active']
        : $variants[$variant]['default'];
@endphp

<div {{ $attributes->merge(['class' => 'flex items-center']) }}>
    {{-- <svg class="w-4 h-4 -ml-1 fill-current" viewBox="0 0 24 24" fill="currentColor">
        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
        <path d="M12 2a5 5 0 1 1 -5 5l.005 -.217a5 5 0 0 1 4.995 -4.783z"
              class="{{ $colors['p1'] }}" />
        <path d="M14 14a5 5 0 0 1 5 5v1a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-1a5 5 0 0 1 5 -5h4z"
              class="{{ $colors['p2'] }}" />
    </svg> --}}
    <svg class="w-[13px] h-[13px] -ml-1 fill-current" version="1.0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
    preserveAspectRatio="xMidYMid meet">
        <g transform="translate(0,512) scale(0.1,-0.1)" stroke="none">
            <path d="M2420 5114 c-200 -26 -408 -102 -565 -207 -83 -56 -108 -77 -203
            -170 -172 -170 -294 -396 -348 -647 -26 -119 -26 -381 0 -500 110 -512 494
            -896 1006 -1006 119 -26 381 -26 500 0 513 111 895 493 1006 1006 26 119 26
            381 0 500 -111 513 -494 896 -1006 1006 -73 15 -320 27 -390 18z"  class="{{ $colors['p2'] }}"/>
            <path d="M1780 2119 c-719 -36 -1109 -131 -1327 -324 -95 -84 -172 -224 -208
            -379 -44 -190 -40 -536 9 -728 73 -287 253 -452 601 -552 315 -90 686 -123
            1485 -133 529 -6 1001 6 1307 32 791 69 1115 242 1218 651 63 248 52 634 -24
            844 -134 367 -474 515 -1331 581 -182 14 -1494 20 -1730 8z" class="{{ $colors['p1'] }}" />
        </g>
    </svg>
</div>
