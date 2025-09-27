@props(['active' => false])

@php
    $classes = ($active)
        ? 'relative flex items-center px-4 py-3 space-x-4 text-white rounded-xl bg-gradient-to-r from-sky-600 to-cyan-400'
        : 'flex items-center px-4 py-3 space-x-4 text-gray-600 rounded-md group';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
