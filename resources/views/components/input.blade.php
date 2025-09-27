@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
'class' =>
'w-full px-5 pr-12 py-3 bg-[#eee] rounded-md border-0
text-[16px] text-[#333] font-medium
placeholder-[#888] placeholder:font-normal
focus:outline-none',
]) !!}>
