@props(['active' => false])

@php
    $classes = ($active)
        ? 'flex items-center px-4 py-3 text-white bg-stone-900 font-semibold rounded-xl mb-1 tracking-wider text-base transition-all duration-300 ease-in-out'
        : 'flex items-center px-4 py-3 mb-1 rounded-xl text-stone-950 hover:bg-stone-100 tracking-wider text-base transition-all duration-300 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
