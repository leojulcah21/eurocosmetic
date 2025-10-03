@props(['active' => false])

@php
    $classes = ($active)
        ? 'py-[3.8px] bg-[rgb(87_83_78/0.13)] text-white opacity-[0.8] text-sm my-0 mx-2 flex items-center whitespace-nowrap rounded-lg px-4 font-semibold group'
        : 'text-white opacity-[0.8] py-[3.8px] hover:bg-[rgb(68_64_60/0.13)] hover:rounded-lg text-sm my-0 mx-2 flex items-center whitespace-nowrap px-4 group';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>

