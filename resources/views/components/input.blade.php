@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }}
    {!! $attributes->merge([
        'class' => 'w-full px-4 pr-12 py-2 bg-[#eee] rounded-md border-0 text-[13px] text-[#333] placeholder-[#888 placeholder:font-normal focus:outline-none',
    ]) !!}
/>
