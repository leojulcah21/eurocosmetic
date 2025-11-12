@props(['icon' => null])
<button {{ $attributes->merge(['type' => 'submit', 'class' => 'flex items-center justify-center px-2.5 sm:pl-2 sm:pr-1 xl:px-8 py-2.5 lg:px-8 text-[10px] ml-auto font-bold leading-normal text-center text-white align-middle transition-all ease-in bg-indigo-500 border-0 rounded-lg shadow-md cursor-pointer hover:shadow-sm hover:-translate-y-px active:opacity-85 uppercase tracking-wider']) }}>

    @isset($icon)
    <div class="mr-2 mb-0.5">
        {{ $icon }}
    </div>
    @endisset

    <div class="{{ (isset($icon) || isset($icon)) ? 'hidden xl:block lg:block' : 'block' }}">
        {{ $slot }}
    </div>
</button>
