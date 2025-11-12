@props(['disabled' => false])

@php
    $id = $attributes->get('id') ?? $attributes->get('name') ?? 'date';
@endphp

<input
    {{ $disabled ? 'disabled' : '' }}
    id="{{ $id }}"
    name="{{ $attributes->get('name') }}"
    {!! $attributes->merge([
        'class' => 'w-full px-4 pr-12 py-2 bg-[#f5f5f5] rounded-md border border-solid border-stone-200 text-[13px] text-[#333] placeholder-[#888] placeholder:font-normal focus:outline-none datepicker-custom',
    ]) !!}
>
