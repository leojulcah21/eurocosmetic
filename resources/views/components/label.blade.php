@props(['value'])

<label {{ $attributes->merge(['class' => 'inline-block mb-2 ml-1 text-[13px] font-bold text-stone-700']) }}>
    {{ $value ?? $slot }}
</label>
