<x-app-layout>
    <x-slot name="header">
        <h6 class="mb-0 text-[17px] font-[600] capitalize text-stone-950 tracking-wider">
            {{ __('Inventory') }}
        </h6>
    </x-slot>
    <x-app.section class="p-8" :title="__('Inventory Management')"
        :description="__('Here you can create, delete, or edit information for each employee type. Just go to the corresponding page.')">
        <div class="items-center max-w-screen-xl gap-8 px-4 py-8 mx-auto shadow rounded-xl xl:gap-16 md:grid md:grid-cols-2 sm:py-16 lg:px-6 bg-gray-50">
            <img class="w-full rounded-lg shadow-lg shadow-stone-100" src="{{ asset('img/inventory/warehouse.jpg') }}" alt="seller_description" />
            <div class='mt-4 md:mt-0'>
                <h2 class="mb-4 text-2xl font-extrabold tracking-tight text-stone-900">
                    {{ __('Warehouses') }}
                </h2>
                <p class="mb-6 text-base font-light text-stone-700">
                    Como administrador, usted puede gestionar todos los vendedores registrados.
                </p>
                <a href="#" class="inline-flex items-center text-white bg-stone-800 transition-all ease-in hover:-translate-y-px focus:ring-4 focus:ring-stone-300 font-medium rounded-lg text-[13px] leading-4 px-5 py-2.5 text-center uppercase">
                    {{ __('Manage') }}
                    <svg class="w-5 h-5 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </a>
            </div>
        </div>
        <div class="items-center max-w-screen-xl gap-8 px-4 py-8 mx-auto shadow rounded-xl xl:gap-16 md:grid md:grid-cols-2 sm:py-16 lg:px-6 bg-gray-50">
            <img class="w-full rounded-lg shadow-lg shadow-stone-100" src="{{ asset('img/inventory/categories.jpg') }}" alt="seller_description" />
            <div class='mt-4 md:mt-0'>
                <h2 class="mb-4 text-2xl font-extrabold tracking-tight text-stone-900">
                    {{ __('Categories') }}
                </h2>
                <p class="mb-6 text-base font-light text-stone-700">
                    Como administrador, usted puede gestionar todos los vendedores registrados.
                </p>
                <a href="#" class="inline-flex items-center text-white bg-stone-800 transition-all ease-in hover:-translate-y-px focus:ring-4 focus:ring-stone-300 font-medium rounded-lg text-[13px] leading-4 px-5 py-2.5 text-center uppercase">
                    {{ __('Manage') }}
                    <svg class="w-5 h-5 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </a>
            </div>
        </div>
        <div class="items-center max-w-screen-xl gap-8 px-4 py-8 mx-auto shadow rounded-xl xl:gap-16 md:grid md:grid-cols-2 sm:py-16 lg:px-6 bg-gray-50">
            <img class="w-full rounded-lg shadow-lg shadow-stone-100" src="{{ asset('img/inventory/product.avif') }}" alt="seller_description" />
            <div class='mt-4 md:mt-0'>
                <h2 class="mb-4 text-2xl font-extrabold tracking-tight text-stone-900">
                    {{ __('Products') }}
                </h2>
                <p class="mb-6 text-base font-light text-stone-700">
                    Como administrador, usted puede gestionar todos los vendedores registrados.
                </p>
                <a href="#" class="inline-flex items-center text-white bg-stone-800 transition-all ease-in hover:-translate-y-px focus:ring-4 focus:ring-stone-300 font-medium rounded-lg text-[13px] leading-4 px-5 py-2.5 text-center uppercase">
                    {{ __('Manage') }}
                    <svg class="w-5 h-5 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </a>
            </div>
        </div>
    </x-app.section>
</x-app-layout>
