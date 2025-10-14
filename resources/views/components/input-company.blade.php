@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
    'class' =>
        'py-2 pl-10 bg-transparent text-stone-600 border-0 focus:outline-none focus:ring-0 sm:text-[13.5px] sm:leading-6',
]) !!}>
