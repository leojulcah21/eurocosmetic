<x-blog-layout>
    <div class="text-stone-950 bg-[#fdfdfd] pb-[60px] px-0">
        <div class="container py-2 mx-auto max-w-screen-2xl">
            <div class="grid grid-cols-1 gap-6 mt-6 sm:grid-cols-2 lg:grid-cols-2">

                <!-- Columna izquierda: productos -->
                <div class="flex-none w-full mx-auto space-y-6 lg:max-w-2xl xl:max-w-4xl">
                    @foreach ($products as $product)
                    <div class="p-4 bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 dark:bg-gray-800 md:p-6">
                        <div class="space-y-4 md:flex md:items-center md:justify-between md:gap-6 md:space-y-0">

                            <!-- Imagen -->
                            <a href="#" class="shrink-0 md:order-1">
                                <img class="w-20 h-20 dark:hidden"
                                     src="{{ $product->images->first()->image_path ?? 'img/no-image.jpg' }}"
                                     alt="{{ $product->name }}" />
                                <img class="hidden w-20 h-20 dark:block"
                                     src="{{ $product->images->first()->image_path ?? 'img/no-image.jpg' }}"
                                     alt="{{ $product->name }}" />
                            </a>

                            <!-- Quantity y precio -->
                            <div class="flex items-center justify-between gap-4 md:order-3 md:justify-end">
                                <div class="flex items-center">
                                    <button type="button" data-input-counter-decrement="counter-input-{{ $product->id }}" class="...">-</button>
                                    <input type="text" id="counter-input-{{ $product->id }}" data-input-counter class="quantity-input" data-price="{{ $product->price }}" value="1" />
                                    <button type="button" data-input-counter-increment="counter-input-{{ $product->id }}" class="...">+</button>
                                </div>
                                <div class="text-end md:order-4 md:w-32">
                                    <p class="text-base font-bold text-gray-900 dark:text-white">S/ {{ number_format($product->price, 2) }}</p>
                                </div>
                            </div>

                            <!-- Nombre y acciones -->
                            <div class="flex-1 w-full min-w-0 space-y-4 md:order-2 md:max-w-md">
                                <a href="#" class="text-base font-medium text-gray-900 hover:underline dark:text-white">
                                    {{ $product->name }}
                                </a>
                                <div class="flex items-center gap-4">
                                    <button class="text-gray-500 hover:text-gray-900 dark:text-gray-400">Add to Favorites</button>
                                    <button class="text-red-600 dark:text-red-500">Remove</button>
                                </div>
                            </div>

                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- Columna derecha: order summary -->
                <div class="flex-1 max-w-4xl mx-auto mt-6 space-y-6 lg:mt-0 lg:w-full">
                    <div id="empty-message" class="hidden text-center text-gray-500 dark:text-gray-400">
                        No hay productos en la carta
                    </div>

                    <div id="order-summary" class="p-4 space-y-4 bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 dark:bg-gray-800 sm:p-6">
                        <p class="text-xl font-semibold text-gray-900 dark:text-white">Order summary</p>
                        <div id="order-items" class="space-y-2"></div>
                        <dl class="flex items-center justify-between gap-4 pt-2 border-t border-gray-200 dark:border-gray-700">
                            <dt class="text-base font-bold text-gray-900 dark:text-white">Total</dt>
                            <dd id="order-total" class="text-base font-bold text-gray-900 dark:text-white">S/ 0.00</dd>
                        </dl>
                        <a href="#" class="flex w-full items-center justify-center rounded-lg bg-primary-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-primary-800 ...">Proceed to Checkout</a>
                    </div>

                    <!-- Voucher -->
                    <div class="p-4 space-y-4 bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 dark:bg-gray-800 sm:p-6">
                        <form class="space-y-4">
                            <label for="voucher" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Do you have a voucher or gift card?</label>
                            <input type="text" id="voucher" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 dark:border-gray-600 dark:bg-gray-700 dark:text-white" required />
                            <button type="submit" class="flex w-full items-center justify-center rounded-lg bg-primary-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-primary-800 ...">Apply Code</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-blog-layout>


<script>
function updateOrderSummary() {
    const orderItems = document.getElementById('order-items');
    const orderTotal = document.getElementById('order-total');
    const orderSummary = document.getElementById('order-summary');
    const emptyMessage = document.getElementById('empty-message');

    orderItems.innerHTML = ''; // limpiar
    let total = 0;
    let hasProducts = false;

    document.querySelectorAll('.quantity-input').forEach(input => {
        const qty = parseInt(input.value) || 0;
        const price = parseFloat(input.dataset.price);

        if (qty > 0) {
            hasProducts = true;
            const subtotal = qty * price;
            total += subtotal;

            const itemDiv = document.createElement('div');
            itemDiv.classList.add('flex', 'justify-between');
            itemDiv.innerHTML = `
                <span>${input.closest('.space-y-4').querySelector('a').innerText} x ${qty}</span>
                <span>S/ ${subtotal.toFixed(2)}</span>
            `;
            orderItems.appendChild(itemDiv);
        }
    });

    orderTotal.textContent = `S/ ${total.toFixed(2)}`;

    // Mostrar u ocultar order summary y mensaje vacío
    if (hasProducts) {
        orderSummary.classList.remove('hidden');
        emptyMessage.classList.add('hidden');
    } else {
        orderSummary.classList.add('hidden');
        emptyMessage.classList.remove('hidden');
    }
}

// Inicializar
document.querySelectorAll('.quantity-input').forEach(input => {
    input.addEventListener('input', updateOrderSummary);
});

// Botones +/-
document.querySelectorAll('[data-input-counter-increment]').forEach(btn => {
    btn.addEventListener('click', e => {
        const inputId = btn.dataset.inputCounterIncrement;
        const input = document.getElementById(inputId);
        input.value = parseInt(input.value) + 1;
        updateOrderSummary();
    });
});

document.querySelectorAll('[data-input-counter-decrement]').forEach(btn => {
    btn.addEventListener('click', e => {
        const inputId = btn.dataset.inputCounterDecrement;
        const input = document.getElementById(inputId);
        input.value = Math.max(parseInt(input.value) - 1, 0);
        updateOrderSummary();
    });
});

// Ejecutar al inicio para ajustar la vista
updateOrderSummary();

</script>
