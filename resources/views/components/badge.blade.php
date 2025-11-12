@props([
    'color' => 'indigo',
    'variant' => 'solid',
    'icon' => null,
    'bordered' => false
])

@php
    $baseClasses = "inline-flex items-center gap-1 text-xs font-medium rounded-full me-2 transition-all";

    $colorMap = [
        'blue' => 'blue',
        'gray' => 'gray',
        'red' => 'red',
        'green' => 'green',
        'yellow' => 'yellow',
        'indigo' => 'indigo',
        'purple' => 'purple',
        'pink' => 'pink'
    ];

    $c = $colorMap[$color] ?? 'indigo';

    // Variantes base
    $variants = [
        'solid' => "text-white bg-$c-600 dark:bg-$c-500",
        'soft' => "bg-$c-100 text-$c-800 dark:bg-$c-900 dark:text-$c-300",
        'outline' => "text-$c-700 border border-$c-500 dark:text-$c-300"
    ];

    $variantClass = $variants[$variant] ?? $variants['soft'];

    // Si el usuario habilita bordered
    if ($bordered && $variant !== 'outline') {
        $variantClass .= " border border-$c-300 dark:border-$c-700";
    }
@endphp

<span {{ $attributes->merge(['class' => "$baseClasses $variantClass"]) }}>
    @if ($icon)
        <x-icon :name="$icon" class="w-3.5 h-3.5" />
    @endif

    {{ $slot }}
</span>
