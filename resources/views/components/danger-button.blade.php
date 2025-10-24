<button {{ $attributes->merge(['type' => 'button', 'class' => 'flex items-center justify-center px-2.5 sm:pl-2 sm:pr-1
    xl:px-8 py-2.5 lg:px-8 text-[10px] ml-auto font-bold leading-normal text-center text-white align-middle
    transition-all ease-in bg-red-600 border-0 rounded-lg shadow-md cursor-pointer tracking-tight-rem hover:shadow-xs
    hover:-translate-y-px active:opacity-85 uppercase tracking-wider']) }}>
    {{ $slot }}
</button>
