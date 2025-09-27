<button {{ $attributes->merge(['type' => 'submit', 'class' => 'w-full h-[48px] bg-stone-950 rounded-[8px] shadow-[0_0_10px_rgba(0,0,0,0.1)] border-none cursor-pointer text-base text-white font-semibold']) }}>
    {{ $slot }}
</button>
