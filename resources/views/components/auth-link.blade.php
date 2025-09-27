@props(['active' => false])

@php
    $classes = ($active)
        ? 'px-6 py-2 font-semibold text-white border-2 border-white rounded-lg hover:bg-stone-800'
        : 'px-6 py-2 font-semibold text-white border-2 border-white rounded-lg hover:bg-stone-900';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
