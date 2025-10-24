<button {{ $attributes->merge(['type' => 'button', 'class' => 'flex items-center justify-center px-8 py-2.5 text-[10px] ml-auto font-bold leading-normal text-center text-stone-950 align-middle transition-all ease-in bg-gray-100 rounded-lg shadow-md cursor-pointer tracking-tight-rem hover:shadow-xs hover:-translate-y-px active:opacity-85 uppercase tracking-wider border border-gray-200']) }}>
    {{ $slot }}
</button>
