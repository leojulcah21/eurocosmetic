@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }}
    {!! $attributes->merge([
        'class' => 'w-full px-4 pr-12 py-2 bg-[#f5f5f5] rounded-md border border-solid border-stone-200 text-sm text-[#333] placeholder-[#888] placeholder:font-normal focus:outline-none focus:ring-0 focus:border-stone-200 shadow-sm',
    ]) !!}
/>
