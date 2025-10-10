<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-block px-8 py-2.5 text-[10px] mb-4 ml-auto font-bold leading-normal text-center text-white align-middle transition-all ease-in bg-blue-500 border-0 rounded-lg shadow-md cursor-pointer tracking-tight-rem hover:shadow-xs hover:-translate-y-px active:opacity-85 uppercase tracking-wider']) }}>
    {{ $slot }}
</button>
