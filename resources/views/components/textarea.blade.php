@props(['disabled' => false])

<textarea
    {{ $disabled ? 'disabled' : '' }}
    {!! $attributes->merge([
        'class' =>
            'w-full py-4 px-5 bg-[#eee] rounded-md border-0 text-[14px] text-[#333] font-medium placeholder-[#888] placeholder:font-normal focus:outline-none',
    ]) !!}
>
</textarea>
