@props(['disabled' => false])

<textarea
    {{ $disabled ? 'disabled' : '' }}
    {!! $attributes->merge([
        'class' =>
            'w-full px-5 pr-12 py-2 bg-[#eee] rounded-md border-0 text-[14px] text-[#333] font-medium placeholder-[#888] placeholder:font-normal focus:outline-none',
    ]) !!}
>
    {{ $slot }}
</textarea>
