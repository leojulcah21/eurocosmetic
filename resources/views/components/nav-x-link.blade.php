@props(['active' => false])

@php
    $classes = ($active)
        ? 'px-4 py-2 font-medium text-white hover:text-stone-200'
        : 'px-4 py-2 text-stone-300 hover:text-white hover:font-medium';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
