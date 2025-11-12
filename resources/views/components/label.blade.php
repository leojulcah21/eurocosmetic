@props(['value'])

<label {{ $attributes->merge(['class' => 'inline-block mb-2 ml-1 text-sm font-semibold text-stone-700']) }}>
    {{ $value ?? $slot }}
</label>
