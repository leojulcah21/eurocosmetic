@props(['active' => false])

@php
    $classes = ($active)
        ? 'px-4 py-2 text-xs font-bold text-white hover:text-stone-200 tracking-wider'
        : 'px-4 py-2 text-xs text-stone-300 hover:text-white hover:font-medium tracking-wider';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
