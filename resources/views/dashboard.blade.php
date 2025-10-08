<x-app-layout>
    <x-slot name="header">
        <h6 class="mb-0 text-xl font-[550] capitalize text-stone-950">
            {{ __('Dashboard') }}
        </h6>
    </x-slot>

    <div class="relative grid w-full gap-6 px-6 py-6 mx-auto md:grid-cols-2 lg:grid-cols-3">
        <x-welcome />
    </div>
</x-app-layout>



