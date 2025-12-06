<x-blog-layout>
    <x-slot name="header">
        Nuestros Productos
    </x-slot>
    <div class='text-stone-950 bg-[#fdfdfd] px-0 py-[60px] overflow-clip scroll-mt-[90px]'>
        <div class='container py-2 mx-auto max-w-screen-2xl'>
            <div class="grid grid-cols-1 gap-6 mt-6 sm:grid-cols-2 lg:grid-cols-4">
                @forelse($products as $product)
                    <div class="p-6 space-y-6 bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 dark:bg-gray-800">
                        <a href="#" class="overflow-hidden rounded">
                            <img class="object-contain mx-auto h-44"
                                src="{{ asset($product->images->first()->image_path ?? 'img/no-image.jpg') }}"
                                alt="{{ $product->name }}">
                        </a>
                        <div>
                            <a href="#"
                                class="text-lg font-semibold leading-tight text-gray-900 hover:underline dark:text-white">
                                {{ $product->name }}
                            </a>
                            <p class="mt-2 text-base font-normal text-gray-500 dark:text-gray-400">
                                {{ $product->short_description }}
                            </p>
                        </div>
                        <div>
                            <p class="text-lg font-bold text-gray-900 dark:text-white">
                                S/ {{ number_format($product->price, 2) }}
                            </p>
                        </div>
                        <div class="mt-6 flex items-center gap-2.5">
                            <div x-data="{ open: false }" class="relative">
                                <a href="#" @mouseenter="open = true" @mouseleave="open = false"
                                    class="inline-flex items-center justify-center gap-2 rounded-lg border border-gray-200 bg-white p-2.5 text-sm font-medium text-gray-900 hover:bg-gray-100 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">

                                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M12 5v14" />
                                        <path d="M5 12h14" />
                                    </svg>
                                </a>

                                <!-- Tooltip -->
                                <div x-show="open" x-transition
                                    class="absolute z-20 px-8 py-1.5 text-sm text-white bg-gray-900 rounded shadow-md -bottom-10 left-1/2 -translate-x-1/2 transition-all duration-[0.3s] ease-in">
                                    Ver información producto
                                </div>
                            </div>

                            <button type="button"
                                class="inline-flex w-full items-center justify-center rounded-lg bg-stone-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-stone-800 focus:outline-none focus:ring-4 focus:ring-stone-300 add-to-cart-btn transition-all duration-[0.3s] ease-in"
                                data-id="{{ $product->id }}">
                                <svg class="w-5 h-5 -ms-2 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M5 4h1.5L9 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm-8.5-3h9.25L19 7h-1M8 7h-.688M13 5v4m-2-2h4" />
                                </svg>
                                Add to cart
                            </button>
                        </div>
                    </div>
                @empty
                    <div class='p-6 mt-6 space-y-6 bg-white border border-gray-200 rounded-lg shadow-sm sm:col-span-2 lg:col-span-4'>
                        <h4> No hay productos registrados, por favor intente más tarde. </h4>
                    </div>
                @endforelse
            </div>
            <div class="flex flex-col items-start justify-between p-4 space-y-3 md:flex-row md:items-center md:space-y-0">
                <span class="text-sm text-gray-500 dark:text-gray-400'">
                    Mostrando
                    <span class="font-semibold text-gray-900 dark:text-white">
                        {{ $products->firstItem() }}
                    </span>
                    -
                    <span class="font-semibold text-gray-900 dark:text-white">
                        {{ $products->lastItem() }}
                    </span>
                    de
                    <span class="font-semibold text-gray-900 dark:text-white">
                        {{ $products->total() }}
                    </span>
                </span>

                <div>
                    {{ $products->links('vendor.pagination.tailwind') }}
                </div>
            </div>
        </div>
    </div>
</x-blog-layout>

<script>
    document.querySelectorAll('.add-to-cart-btn').forEach(btn => {
        btn.addEventListener('click', function () {
            const productId = this.dataset.id;
            const thisBtn = this;

            fetch("{{ route('cart.add') }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                body: JSON.stringify({ product_id: productId })
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {

                    // Actualizar contador
                    const counter = document.querySelector('.cart-counter');
                    if (counter) counter.innerText = data.cart_count;

                    thisBtn.disabled = true;

                    const addedDiv = document.createElement("div");
                    addedDiv.className =
                        "inline-flex w-full items-center justify-center rounded-lg border border-stone-700 bg-white px-5 py-2.5 text-sm font-medium text-stone-700 transition-opacity duration-300";
                    addedDiv.innerHTML = `
                        <svg class="w-5 h-5 -ms-2 me-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            d="M5 13l4 4L19 7"/>
                        </svg>
                        Producto añadido
                    `;

                    thisBtn.replaceWith(addedDiv);

                    setTimeout(() => {
                        addedDiv.replaceWith(thisBtn);
                        thisBtn.disabled = false;
                    }, 2500);
                }
            });
        });
    });
</script>

@if (session('swal_success'))
<script>
    Swal.fire({
        title: '¡Compra realizada!',
        text: '{{ session("swal_success") }}',
        icon: 'success',
        confirmButtonText: 'Aceptar'
    });
</script>
@endif

@if (session()->pull('email_verified'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Correo verificado correctamente',
        text: 'Ahora completa tu perfil para continuar.',
        confirmButtonColor: '#111827',
    });
</script>
@endif
