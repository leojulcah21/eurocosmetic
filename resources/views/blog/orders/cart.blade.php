<x-blog-layout>
    <x-slot name="header">
        {{ __('Cart') }}
    </x-slot>

    <div class="text-stone-950 bg-[#fdfdfd] px-0 py-[60px] overflow-clip scroll-mt-[90px]">
        <div class="container py-2 mx-auto max-w-screen-2xl">
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-12">
                <div class='lg:col-span-8'>
                    <div class="p-6 mb-6 bg-white rounded-lg shadow-md">
                        <div class='pb-4 mb-6 border-b border-stone-200'>
                            <div class='grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-12'>
                                <div class='lg:col-span-6'>
                                    <h5 class='text-[0.9rem] font-semibold mb-0 text-stone-800'>Producto</h5>
                                </div>
                                <div class='text-center lg:col-span-2'>
                                    <h5 class='text-[0.9rem] font-semibold mb-0 text-stone-800'>Precio</h5>
                                </div>
                                <div class='text-center lg:col-span-2'>
                                    <h5 class='text-[0.9rem] font-semibold mb-0 text-stone-800'>Cantidad</h5>
                                </div>
                                <div class='text-center lg:col-span-2'>
                                    <h5 class='text-[0.9rem] font-semibold mb-0 text-stone-800'>Total</h5>
                                </div>
                            </div>
                        </div>
                        @forelse ($cart as $product)
                            <div class='px-0 py-5 transition-all duration-[0.3s] ease-in cart-item'>
                                <div class='grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-12'>
                                    @php
                                        $prod = \App\Models\Product::find($product['id']);
                                    @endphp
                                    <div class="col-span-12 mt-3 mb-3 lg:col-span-6 lg:mt-0 lg:mb-0 last:border-b-0">
                                        <div class='flex items-center'>
                                            <div class="flex items-center justify-center w-20 h-20 mr-4 overflow-hidden bg-white border border-solid rounded-md min-w-20 border-stone-300">
                                                <img class="object-contain max-w-full max-h-full"
                                                    src="{{ $prod->images->first()->image_path ?? 'img/no-image.jpg' }}"
                                                    alt="{{ $product['name'] }}" />
                                            </div>
                                            <div class="flex-1">
                                                <h6 class="mb-2 text-base font-semibold text-stone-800">
                                                    {{ $product['name'] }}
                                                </h6>
                                                <div class='flex flex-wrap gap-3 mb-2 text-[13px] text-stone-700'>
                                                    <span class='inline-block italic text-stone-600'>
                                                        {{ $product['category'] }}
                                                    </span>
                                                    <span class='inline-block'>
                                                        {{ $product['short_description'] }}
                                                    </span>
                                                </div>
                                                <button class="p-0 border-none text-stone-900 hover:text-red-600 remove-btn bg-none text-[13px] inline-flex items-center gap-1 transition-all duration-[0.3s] ease-in" data-id="{{ $product['id'] }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4"><path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                        <path d="M4 7l16 0" />
                                                        <path d="M10 11l0 6" />
                                                        <path d="M14 11l0 6" />
                                                        <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                                        <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                                    </svg>
                                                    <span class='pt-0.5'>
                                                        {{ __('Remove') }}
                                                    </span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-span-12 mt-3 text-center lg:col-span-2 lg:mt-0">
                                        <div>
                                            <span class="text-base font-semibold text-gray-900 dark:text-white">
                                                S/ {{ number_format($product['price'], 2) }}
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-span-12 mx-auto mt-3 text-center lg:col-span-2 lg:mt-0">
                                        <div class="flex items-center overflow-hidden border border-solid rounded-[6px] border-stone-300">
                                            <button type="button" data-input-counter-decrement="counter-input-{{ $product['id'] }}" class="items-center justify-center flex-none w-8 h-8 text-stone-600 hover:bg-stone-100 quantity-selector">
                                                <i class="bi bi-dash"></i>
                                            </button>
                                            <input type="text" id="counter-input-{{ $product['id'] }}" data-input-counter class="w-10 px-0 py-1 text-sm font-semibold text-center border-0 max-w-10 text-stone-800 focus:outline-none shrink quantity-input" data-price="{{ $product['price'] }}" value="{{ $product['quantity'] }}" />
                                            <button type="button" data-input-counter-increment="counter-input-{{ $product['id'] }}" class="items-center justify-center flex-none w-8 h-8 text-stone-600 hover:bg-stone-100 quantity-selector">
                                                <i class="bi bi-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-span-12 mt-3 text-center lg:col-span-2 lg:mt-0">
                                        <div class='text-lg font-[700] item-total'>
                                            <span>S/ 0.00</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class='px-0 py-5 transition-all duration-[0.3s] ease-in cart-item'>
                                <div class='grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-12'>
                                    <div class="col-span-12">
                                        <div class='flex items-center justify-center text-center'>
                                            <h4 class='text-lg text-stone-900'>El carrito está vacío, por favor añada al menos un producto.</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforelse
                            <div class='pt-6 mt-4 border-t border-stone-200'>
                                <div class='grid grid-cols-1 lg:grid-cols-12'>
                                    <div class='mb-3 lg:col-span-6 lg:mb-0'>
                                        <div>
                                            <div class='max-w-96'>
                                                <input type="text" class='text-sm bg-white rounded-l-[6px] border-stone-600 form-control text-stone-600 focus:shadow-none focus:border-stone-700' placeholder="Código de cupón" />
                                                <button class='px-5 py-[9px] -ml-1 text-sm text-white rounded-r-[6px] btn border-stone-700 bg-stone-700 hover:opacity-100 hover:bg-stone-800 transition-all duration-[0.3s] ease-in'>
                                                    Aplicar cupón
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class='lg:col-span-6 md:text-end'>

                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
                <div class='mt-4 lg:col-span-4 lg:mt-0'>
                    <div class="sticky p-6 bg-white rounded-lg shadow-md top-[6.5rem]">
                        <h4 class="pb-3 mb-5 text-xl font-semibold text-gray-900 border-b dark:text-white border-stone-300">
                            Order summary
                        </h4>
                        <div id="order-items" class='flex items-start justify-between mb-[1rem] text-[0.9375rem]'></div>
                        <div class="flex items-center justify-between pt-4 mx-0 my-6 border-t border-stone-300">
                            <span class="text-lg font-semibold text-gray-900">
                                Total
                            </span>
                            <span id="order-total" class="text-2xl font-bold text-gray-900">
                                S/ 0.00
                            </span>
                        </div>
                        <div class='mb-4'>
                            <button onclick="initPayment()" class="flex px-6 py-3 font-semibold text-[1rem] transition-all duration-[0.3s] ease-in items-center justify-center gap-2 bg-stone-800 hover:bg-stone-900 text-white rounded-lg group mx-auto">
                                Proceed to Checkout
                                <i class="transition-transform bi bi-arrow-right duration-[0.3s] ease-in group-hover:translate-x-1"></i>
                            </button>
                        </div>
                        <div class="pt-4 border-t border-solid border-stone-300">
                            <p class="mb-2 text-sm text-center text-stone-800">Aceptamos pagos con:</p>
                            <div class="flex justify-center gap-4">
                                <i class="text-2xl transition-colors bi bi-credit-card text-stone-600 hover:text-stone-900 duration-[0.3s] ease-in"></i>
                                <i class="text-2xl transition-colors bi bi-paypal text-stone-600 hover:text-stone-900 duration-[0.3s] ease-in"></i>
                                <i class="text-2xl transition-colors bi bi-wallet2 text-stone-600 hover:text-stone-900 duration-[0.3s] ease-in"></i>
                                <i class="text-2xl transition-colors bi bi-bank text-stone-600 hover:text-stone-900 duration-[0.3s] ease-in"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="mpModal" class="fixed inset-0 z-50 items-center justify-center hidden pt-5 bg-black/50">
        <div class="relative w-full p-2 mx-auto bg-white rounded-lg max-w-[130rem] dark:bg-gray-800">
            <button id="closeModal" class="absolute text-gray-600 top-2 right-2 dark:text-gray-300">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M18 6l-12 12" /><path d="M6 6l12 12" /></svg>
            </button>
            <div id="paymentBrick" class='-mt-12'></div>
        </div>
    </div>
</x-blog-layout>
<script src="https://sdk.mercadopago.com/js/v2"></script>
<script>
    const mp = new MercadoPago("{{ env('MP_PUBLIC_KEY') }}");
    let userId = {{ auth()->id() }};
    let paymentBrickController = null;

    /* --------------------------------------------------------
       CARRITO (NO TOCADO – EXACTO AL TUYO)
    -------------------------------------------------------- */

    function updateOrderSummary() {
        const orderItems = document.getElementById('order-items');
        const orderTotal = document.getElementById('order-total');

        let total = 0;
        orderItems.innerHTML = '';

        document.querySelectorAll('.quantity-input').forEach(input => {
            const qty = parseInt(input.value) || 0;
            const price = parseFloat(input.dataset.price);
            const itemContainer = input.closest('.cart-item');
            const subtotal = qty * price;

            if (qty > 0) {
                total += subtotal;

                itemContainer.querySelector('.item-total span').textContent =
                    `S/ ${subtotal.toFixed(2)}`;

                const div = document.createElement('div');
                div.classList.add('flex', 'justify-between');
                div.innerHTML =
                    `<span>${itemContainer.querySelector('img').alt} x ${qty}</span>
                    <span>S/ ${subtotal.toFixed(2)}</span>`;
                orderItems.appendChild(div);
            } else {
                itemContainer.querySelector('.item-total span').textContent = `S/ 0.00`;
            }
        });

        orderTotal.textContent = `S/ ${total.toFixed(2)}`;
    }

    function updateDecrementButtons() {
        document.querySelectorAll('[data-input-counter-decrement]').forEach(btn => {
            const input = document.getElementById(btn.dataset.inputCounterDecrement);
            const disabled = parseInt(input.value) <= 1;
            btn.disabled = disabled;
            btn.classList.toggle("opacity-40", disabled);
            btn.classList.toggle("cursor-not-allowed", disabled);
        });
    }

    document.querySelectorAll('[data-input-counter-decrement]').forEach(btn => {
        btn.addEventListener('click', () => {
            const input = document.getElementById(btn.dataset.inputCounterDecrement);
            input.value = Math.max(parseInt(input.value) - 1, 1);
            updateOrderSummary();
            updateDecrementButtons();
        });
    });

    document.querySelectorAll('[data-input-counter-increment]').forEach(btn => {
        btn.addEventListener('click', () => {
            const input = document.getElementById(btn.dataset.inputCounterIncrement);
            input.value = parseInt(input.value) + 1;
            updateOrderSummary();
            updateDecrementButtons();
        });
    });

    document.querySelectorAll('.remove-btn').forEach(btn => {
        btn.addEventListener('click', async () => {
            const productId = btn.dataset.id;
            const productCard = btn.closest('.cart-item');

            const res = await fetch("{{ route('cart.remove') }}", {
                method: "POST",
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ product_id: productId })
            });

            const data = await res.json();

            if (data.success) {
                productCard.style.transition = "opacity .2s ease";
                productCard.style.opacity = 0;

                setTimeout(() => {
                    productCard.remove();
                    updateOrderSummary();
                    updateDecrementButtons();
                    window.location.replace(window.location.href);
                }, 150);
            }
        });
    });

    updateOrderSummary();
    updateDecrementButtons();

    function getUpdatedCart() {
        const updated = [];

        document.querySelectorAll('.cart-item').forEach(item => {
            const id = item.querySelector('.remove-btn').dataset.id;
            const input = item.querySelector('.quantity-input');
            const qty = parseInt(input.value) || 1;
            const price = parseFloat(input.dataset.price);

            updated.push({
                id: parseInt(id),
                quantity: qty,
                price: price
            });
        });

        return updated;
    }

    /* --------------------------------------------------------
       MODAL
    -------------------------------------------------------- */
    function openCheckout() {
        document.getElementById("mpModal").classList.remove("hidden");
    }

    function closeCheckout() {
        document.getElementById("mpModal").classList.add("hidden");
    }

    document.getElementById("closeModal").addEventListener("click", closeCheckout);


    /* --------------------------------------------------------
       CREAR PREFERENCIA
    -------------------------------------------------------- */
    async function createPreference() {
        const response = await fetch("{{ route('mp.create') }}", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
            },
            body: JSON.stringify({
                cart: getUpdatedCart(),
                user_id: userId
            })
        });

        return await response.json();
    }


    /* --------------------------------------------------------
       PAYMENT BRICK (MODIFICADO PARA QUE TODO FUNCIONE)
    -------------------------------------------------------- */
    async function initPayment() {

        if (paymentBrickController) {
            await paymentBrickController.unmount();
            paymentBrickController = null;
        }

        document.getElementById("paymentBrick").innerHTML = "";

        openCheckout();

        const pref = await createPreference();
        const bricks = mp.bricks();

        paymentBrickController = await bricks.create(
            "payment",
            "paymentBrick",
            {
                initialization: {
                    amount: pref.amount,
                    preferenceId: pref.preference_id
                },
                customization: {
                    paymentMethods: {
                        creditCard: 'all',
                        debitCard: 'all',
                        wallet: 'all',
                        ticket: 'none',
                        bank_transfer: 'all'
                    }
                },
                callbacks: {
                    onReady: () => {
                        console.log("Brick listo");
                    },
                    onError: (error) => {
                        console.error("Error en el brick:", error);
                    },

                    /* ---------------------------
                       ESTA ES LA PARTE CLAVE
                    ---------------------------- */
                    onSubmit: async ({ formData }) => {
                        try {
                            // borrar identification forzado
                            if (formData.payer?.identification) {
                                delete formData.payer.identification;
                            }

                            const response = await fetch("{{ route('mp.process') }}", {
                                method: "POST",
                                headers: {
                                    "Content-Type": "application/json",
                                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                                },
                                body: JSON.stringify({
                                    formData: formData,
                                    user_id: userId,
                                    cart: getUpdatedCart() // ← siempre actualizado
                                })
                            });

                            const result = await response.json();
                            console.log("Resultado del pago:", result);

                            if (result.status === "approved") {
                                closeCheckout();
                                window.location.href = "/products?payment=success";
                            }

                            return {
                                status: "success",
                                message: "Pago procesado",
                                data: result
                            };

                        } catch (error) {
                            console.error("Error procesando pago:", error);
                            throw error;
                        }
                    }
                },
            },
            { mercadoPago: mp }
        );
    }
</script>

