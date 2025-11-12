@props(['active' => false])

@php
    $classes = ($active)
        ? 'py-2 pe-4 text-[13px] font-bold text-white hover:text-stone-200 tracking-widest'
        : 'py-2 pe-4 text-[13px] text-stone-300 hover:text-white hover:font-medium tracking-widest';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
