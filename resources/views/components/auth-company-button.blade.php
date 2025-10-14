<button
    {{ $attributes->merge([
        'type' => 'submit',
        'class' =>
            'flex justify-center rounded-full px-3 py-1.5 uppercase text-[11px] font-semibold leading-6 text-white shadow-lg transition ease-in-out bg-gradient-to-r from-amber-400 via-amber-500 to-amber-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-amber-800 shadow-lg shadow-amber-500/50 dark:shadow-lg dark:shadow-amber-800/80 duration-150 tracking-[2.3px]',
    ]) }}>
    {{ $slot }}
</button>
