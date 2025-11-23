<x-blog-layout>
    <div class="text-stone-950 bg-[#fdfdfd] pb-[60px] px-0">
        <div class="container py-2 mx-auto max-w-screen-2xl">
            <div class="grid grid-cols-1 gap-6 mt-6 sm:grid-cols-2 lg:grid-cols-2">

                <!-- Columna izquierda: productos -->
                <div class="flex-none w-full mx-auto space-y-6 lg:max-w-2xl xl:max-w-4xl">
                    @foreach ($cart as $product)
                    <div class="p-4 bg-white border border-gray-200 rounded-lg shadow-sm md:p-6">
                        <div class="space-y-4 md:flex md:items-center md:justify-between md:gap-6 md:space-y-0">
                            @php $prod = \App\Models\Product::find($product['id']); @endphp

                            <a href="#" class="shrink-0 md:order-1">
                                <img class="w-20 h-20 dark:hidden"
                                     src="{{ $prod->images->first()->image_path ?? 'img/no-image.jpg' }}"
                                     alt="{{ $product['name'] }}" />
                            </a>

                            <div class="flex items-center justify-between gap-4 md:order-3 md:justify-end">
                                <div class="flex items-center">
                                    <button type="button" data-input-counter-decrement="counter-input-{{ $product['id'] }}" class="px-2">-</button>
                                    <input type="text" id="counter-input-{{ $product['id'] }}" data-input-counter class="quantity-input" data-price="{{ $product['price'] }}" value="1" />
                                    <button type="button" data-input-counter-increment="counter-input-{{ $product['id'] }}" class="px-2">+</button>
                                </div>
                                <div class="text-end md:order-4 md:w-32">
                                    <p class="text-base font-bold text-gray-900 dark:text-white">S/ {{ number_format($product['price'], 2) }}</p>
                                </div>
                            </div>

                            <div class="flex-1 w-full min-w-0 space-y-4 md:order-2 md:max-w-md">
                                <a href="#" class="text-base font-medium text-gray-900 hover:underline dark:text-white">
                                    {{ $product['name'] }}
                                </a>
                                <div class="flex items-center gap-4">
                                    <button class="text-gray-500 hover:text-gray-900 dark:text-gray-400">Add to Favorites</button>
                                    <button class="text-red-600 dark:text-red-500 remove-btn" data-id="{{ $product['id'] }}">Remove</button>
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

                    <div id="order-summary" class="p-4 space-y-4 bg-white border border-gray-200 rounded-lg shadow-sm sm:p-6">
                        <p class="text-xl font-semibold text-gray-900 dark:text-white">Order summary</p>
                        <div id="order-items" class="space-y-2"></div>
                        <dl class="flex items-center justify-between gap-4 pt-2 border-t border-gray-200 dark:border-gray-700">
                            <dt class="text-base font-bold text-gray-900 dark:text-white">Total</dt>
                            <dd id="order-total" class="text-base font-bold text-gray-900 dark:text-white">S/ 0.00</dd>
                        </dl>
                        <a href="#" id="proceedCheckout" class="flex w-full items-center justify-center rounded-lg bg-stone-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-stone-800">Proceed to Checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para Mercado Pago -->
    <div id="mpModal" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/50">
        <div class="bg-white dark:bg-gray-800 rounded-lg p-6 max-w-lg w-full relative">
            <button id="closeModal" class="absolute top-2 right-2 text-gray-600 dark:text-gray-300">&times;</button>
            <h3 class="text-lg font-semibold mb-4 text-gray-900 dark:text-white">Pagar Orden</h3>
            <div id="cardPaymentBrick_container"></div>
        </div>
    </div>
</x-blog-layout>

<script src="https://sdk.mercadopago.com/js/v2"></script>
<script>
    console.log("URL del fetch:", "{{ route('orders.create-from-cart') }}");
        const mp = new MercadoPago("{{ config('services.mercadopago.public_key') }}", { locale: "es-PE" });
        const mpModal = document.getElementById('mpModal');

        function updateOrderSummary(){
            const orderItems = document.getElementById('order-items');
            const orderTotal = document.getElementById('order-total');
            let total = 0;
            let hasProducts = false;

            orderItems.innerHTML = '';
            document.querySelectorAll('.quantity-input').forEach(input=>{
                const qty = parseInt(input.value)||0;
                const price = parseFloat(input.dataset.price);
                if(qty>0){
                    hasProducts=true;
                    const subtotal=qty*price;
                    total+=subtotal;
                    const div = document.createElement('div');
                    div.classList.add('flex','justify-between');
                    div.innerHTML = `<span>${input.closest('.p-4').querySelector('img').alt} x ${qty}</span><span>S/ ${subtotal.toFixed(2)}</span>`;
                    orderItems.appendChild(div);
                }
            });

            orderTotal.textContent=`S/ ${total.toFixed(2)}`;
            document.getElementById('order-summary').classList.toggle('hidden', !hasProducts);
            document.getElementById('empty-message').classList.toggle('hidden', hasProducts);
        }

        // Botones +/-
        document.querySelectorAll('[data-input-counter-increment]').forEach(btn=>{
            btn.addEventListener('click', ()=>{
                const input = document.getElementById(btn.dataset.inputCounterIncrement);
                input.value=parseInt(input.value)+1;
                updateOrderSummary();
            });
        });
        document.querySelectorAll('[data-input-counter-decrement]').forEach(btn=>{
            btn.addEventListener('click', ()=>{
                const input = document.getElementById(btn.dataset.inputCounterDecrement);
                input.value=Math.max(parseInt(input.value)-1,0);
                updateOrderSummary();
            });
        });

        document.querySelectorAll('.remove-btn').forEach(btn=>{
            btn.addEventListener('click', async ()=>{
                const productId=btn.dataset.id;
                const productCard=btn.closest('.p-4');
                const res = await fetch("{{ route('orders.create-from-cart') }}", {
                    method: "POST",
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({ cart })
                });

                const data=await res.json();
                if(data.success && productCard) productCard.remove();
                updateOrderSummary();
            });
        });

        updateOrderSummary();

        // Pagar
        document.getElementById('proceedCheckout').addEventListener('click', async ()=>{
            const cart=[];
            document.querySelectorAll('.quantity-input').forEach(input=>{
                const qty=parseInt(input.value)||0;
                if(qty>0) cart.push({product_id: input.closest('.p-4').querySelector('.remove-btn').dataset.id, quantity: qty});
            });
            if(cart.length===0){ alert('El carrito está vacío'); return; }

            // Crear orden en backend
            const res = await fetch("{{ route('orders.create-from-cart') }}", {
                method: "POST",
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ cart })
            });

            const data=await res.json();
            const orderId=data.order_id;

            // Mostrar modal
            mpModal.classList.remove('hidden');

            // Inicializar Brick
            mp.bricks().create('cardPayment','cardPaymentBrick_container',{
                initialization:{
                    amount:data.total_amount,
                    preferenceId:null
                },
                callbacks:{
                    onSubmit: async (cardFormData)=>{
                        cardFormData.order_id=orderId;
                        const r=await fetch('/procesar-pago',{
                            method:'POST',
                            headers:{
                                'Content-Type':'application/json',
                                'X-CSRF-TOKEN':'{{ csrf_token() }}'
                            },
                            body:JSON.stringify(cardFormData)
                        });
                        const resp=await r.json();
                        if(resp.status==='approved'){ alert('Pago aprobado 😎🔥'); location.reload(); }
                        else alert('Estado del pago: '+resp.status);
                    },
                    onError:(err)=>console.error(err)
                }
            });
        });

        document.getElementById('closeModal').addEventListener('click', ()=>{
            mpModal.classList.add('hidden');
        });
    </script>
