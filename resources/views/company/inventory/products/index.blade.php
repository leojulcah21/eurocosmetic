<x-app-layout>
    <x-slot name="header">
        <h6 class="mb-0 text-[17px] font-[600] capitalize text-stone-950 tracking-wider">
            {{ __('Products') }}
        </h6>
    </x-slot>
    <div>
        <x-app.data-section class='bg-clip-border'>
            <div class="relative w-full p-12 overflow-hidden bg-white shadow-md sm:rounded-lg">
                <div class="flex flex-col items-center justify-between py-4 mb-3 space-y-3 md:flex-row md:space-y-0 md:space-x-4">
                    <div class="w-full md:w-1/2">
                        <form class="flex items-center">
                            <label for="simple-search" class="sr-only">Search</label>
                            <div class="relative w-full">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg aria-hidden="true" class="w-5 h-5 text-stone-500" fill="currentColor"
                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <input type="text" id="simple-search"
                                    class="block w-full p-2 pl-10 text-sm border rounded-lg border-stone-300 text-stone-900 bg-stone-50 focus:ring-primary-500 focus:border-primary-500"
                                    placeholder="Search" required>
                            </div>
                        </form>
                    </div>

                    <div
                        class="flex flex-col items-stretch justify-end flex-shrink-0 w-full space-y-2 md:w-auto md:flex-row md:space-y-0 md:items-center md:space-x-3">
                        <x-primary-link href="{{ route('company.employees.sellers.create') }}">
                            <x-slot:icon>
                                <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path clip-rule="evenodd" fill-rule="evenodd"
                                        d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                                </svg>
                            </x-slot:icon>

                            Nuevo Producto
                        </x-primary-link>
                    </div>
                </div>
                <div class="grid gap-4 mb-4 sm:grid-cols-1 md:mb-8 lg:grid-cols-2 xl:grid-cols-3">
                    @foreach ($products as $product)
                        <div class="p-6 border border-gray-200 rounded-lg shadow-sm bg-stone-50 dark:border-gray-700 dark:bg-gray-800">
                            <div class="w-full h-56">
                                <a href="#">
                                    <img class="h-full mx-auto dark:hidden" src="{{ asset($product->image_url) }}" alt="" />
                                </a>
                            </div>
                            <div class="pt-6">


                                <h1 class="text-base font-semibold leading-tight text-stone-950">
                                    {{ $product->name }}
                                </h1>
                                <p class="pt-1.5 text-sm leading-tight text-stone-950 dark:text-white">
                                    {{ $product->description }}
                                </p>

                                <ul class="flex items-center gap-5 pt-3.5">
                                    <li class="flex items-center gap-2">
                                        <x-badge variant='soft' color='blue' class="px-4 py-0.5 text-xs">
                                            {{ $product->category->name }}
                                        </x-badge>
                                    </li>

                                    <li class="flex items-center gap-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5 text-stone-800">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                            <path d="M3 21v-13l9 -4l9 4v13" />
                                            <path d="M13 13h4v8h-10v-6h6" />
                                            <path d="M13 21v-9a1 1 0 0 0 -1 -1h-2a1 1 0 0 0 -1 1v3" />
                                        </svg>
                                        <p class="text-sm font-medium text-stone-800">
                                            {{ $product->warehouse->name }}
                                        </p>
                                    </li>

                                    <li class="flex items-center gap-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5 text-stone-800">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                            <path d="M12 3l8 4.5l0 9l-8 4.5l-8 -4.5l0 -9l8 -4.5" />
                                            <path d="M12 12l8 -4.5" />
                                            <path d="M12 12l0 9" />
                                            <path d="M12 12l-8 -4.5" />
                                            <path d="M16 5.25l-8 4.5" />
                                        </svg>
                                        <p class="text-sm font-medium text-stone-800">
                                            {{ $product->stock }} {{ __('in stock') }}
                                        </p>
                                    </li>
                                </ul>

                                <div class="flex items-center justify-between gap-4 mt-4">
                                    <p class="text-base font-extrabold leading-tight text-gray-900 dark:text-white">S/. {{ $product->price }}</p>
                                    <div class="inline-flex rounded-md shadow-xs" role="group">
                                        <x-button variant="gradient" color="primary" shadow="glow" type="button" class="me-0.5">
                                            <x-slot:icon>
                                                <svg class="w-4 h-4 -ms-2 me-2" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                    <path d="M4 20h4l10.5 -10.5a2.828 2.828 0 1 0 -4 -4l-10.5 10.5v4" />
                                                    <path d="M13.5 6.5l4 4" />
                                                </svg>
                                            </x-slot:icon>
                                            Editar
                                        </x-button>
                                        <x-button variant="gradient" color="danger" shadow="glow" class="ms-1">
                                            <x-slot:icon>
                                                <svg class="w-4 h-4 me-2" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <path d="M4 7l16 0" />
                                                    <path d="M10 11l0 6" />
                                                    <path d="M14 11l0 6" />
                                                    <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                                    <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                                </svg>
                                            </x-slot:icon>
                                            Eliminar
                                        </x-button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </x-app.data-section>
    </div>
</x-app-layout>
