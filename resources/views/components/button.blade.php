@props([
    'variant' => 'default',
    'color' => 'primary',
    'icon' => null,
    'shadow' => 'none'
])

@php
    // Colores base
    $colorClasses = [
        'primary' => [
            'base' => 'bg-indigo-500',
            'gradient' => 'bg-gradient-to-br from-violet-600 via-indigo-600 to-indigo-500',
            'shadow' => 'hover:shadow-indigo-500/40 hover:shadow-lg'
        ],
        'danger' => [
            'base' => 'bg-red-600',
            'gradient' => 'bg-gradient-to-br from-pink-700 via-red-600 to-red-500',
            'shadow' => 'hover:shadow-red-500/40 hover:shadow-lg'
        ],
        'dark' => [
            'base' => 'bg-stone-950',
            'gradient' => 'bg-gradient-to-br from-stone-900 via-zinc-800 to-stone-950',
            'shadow' => 'hover:shadow-stone-800/50 hover:shadow-lg'
        ],
    ];

    // Sombra personalizada si $shadow != 'none'
    $shadowClass = match ($shadow) {
        'sm' => 'hover:shadow-sm',
        'md' => 'hover:shadow-md',
        'lg' => 'hover:shadow-lg',
        'xl' => 'hover:shadow-xl',
        'glow' => 'hover:shadow-[0_0_15px_rgba(99,102,241,0.6)]',
        default => '',
    };

    // Asegurar que exista el color en el array
    $c = $colorClasses[$color] ?? $colorClasses['primary'];

    // Estilos según variante
    switch ($variant) {
        case 'normal':
            $variantClass = "text-white {$c['base']} border-0 shadow-md";
            break;

        case 'gradient':
            $variantClass = "text-white {$c['gradient']} hover:bg-gradient-to-tr border-0";
            break;

        default:
            $variantClass = "text-white bg-indigo-600 border-0";
            break;
    }

    // Aplicar sombra dinámica (si no es 'none')
    if ($shadow !== 'none') {
        $variantClass .= " {$c['shadow']} $shadowClass";
    }
@endphp

<button
    {{ $attributes->merge([
        'type' => 'submit',
        'class' => "flex items-center justify-center px-2.5 sm:pl-2 sm:pr-1 xl:px-8 py-2.5 lg:px-8 text-xs ml-auto font-semibold leading-normal text-center align-middle transition-all ease-in rounded-lg cursor-pointer hover:-translate-y-px active:opacity-85 uppercase tracking-widest $variantClass"
    ])}}
>
    @isset($icon)
        <div class="mr-2 mb-0.5">
            {{ $icon }}
        </div>
    @endisset

    <div class="{{ $icon ? 'hidden xl:block lg:block' : 'block' }}">
        {{ $slot }}
    </div>
</button>
