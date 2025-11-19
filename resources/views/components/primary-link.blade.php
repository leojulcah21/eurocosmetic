<a {{ $attributes->merge(['type' => 'submit', 'class' => 'flex items-center justify-center px-8 py-2.5 text-xs ml-auto font-semibold leading-normal text-center text-white align-middle transition-all ease-in bg-blue-500 border-0 rounded-lg shadow-md cursor-pointer tracking-tight-rem hover:shadow-xs hover:-translate-y-px active:opacity-85 uppercase tracking-wider']) }}>
    @isset($icon)
        <div class="mr-2 mb-0.5">
            {{ $icon }}
        </div>
    @endisset

    <div class="{{ (isset($icon) || isset($icon)) ? 'hidden xl:block lg:block' : 'block' }}">
        {{ $slot }}
    </div>
</a>
