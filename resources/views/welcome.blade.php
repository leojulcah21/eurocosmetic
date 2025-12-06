<x-blog-layout>
    <div class='relative mb-[60px] flex items-center min-h-[650px] py-[100px] overflow-hidden [background:_linear-gradient(135deg,_#ffffff_0%,_color-mix(in_srgb,_#991b1b,_transparent_95%)_100%)] before:absolute before:top-0 before:right-0 before:h-full before:w-1/2 before:content-[""] before:z-[-1] before:[background:_linear-gradient(45deg,_color-mix(in_srgb,_#991b1b,_transparent_94%)_0%,_color-mix(in_srgb,_#450a0a,_transparent_98%)_100%)] before:[clip-path:_polygon(20%_0%,100%_0%,100%_100%,0%_100%)]'>
        <div class='grid items-center grid-cols-2 gap-20 max-w-[1400px] my-0 mx-auto py-0 px-5'>
            <div class='z-[2]'>
                <div class='max-w-[600px]'>
                    <h1 class='mb-6 text-[3.5rem] font-bold leading-[1.1]'>
                        Descubre los mejores productos capilares para tu negocio
                    </h1>
                    <p class='mb-10 text-[1.2rem] leading-7 text-stone-700'>
                        Explora nuestra colección de productos para el cuidado del cabello, diseñados exclusivamente
                        para potenciar tu negocio. Desde champús hasta ropa de peluquería, encuentra todo lo que
                        necesitas con ofertas exclusivas y envío a domicilio.
                    </p>
                    <div class='flex flex-wrap gap-5 mb-[50px]'>
                        <a href="{{ route('products') }}"
                            class='px-8 py-4 text-[1.1rem] font-semibold no-underline [transition:_all_0.3s_ease] rounded-[10px] inline-flex items-center relative overflow-hidden before:w-full before:h-full before:content-[""] before:absolute before:top-0 before:-left-full before:hover:left-full primary text-white border-none [box-shadow:_0_8px_25px_color-mix(in_srgb,_#292524,_transparent_70%)] hover:[box-shadow:_0_12px_35px_color-mix(in_srgb,_#292524,_transparent_60%)] hover:-translate-y-[3px] [background:linear-gradient(135deg,_#292524_0%,_color-mix(in_srgb,_#292524,_#000_20%)_100%)] before:[background:_linear-gradient(_90deg,_transparent,_rgba(255,255,255,0.2),_transparent)] before:[transition:_left_0.6s_ease]'>
                            Compra Aquí
                        </a>
                        <a href="#"
                            class='px-8 py-4 text-[1.1rem] font-semibold no-underline [transition:_all_0.3s_ease] rounded-[10px] inline-flex items-center relative overflow-hidden before:w-full before:h-full before:content-[""] before:absolute before:top-0 before:-left-full before:hover:left-full primary text-stone-900 [box-shadow:_0_8px_25px_color-mix(in_srgb,_#292524,_transparent_70%)] hover:[box-shadow:_0_12px_35px_color-mix(in_srgb,_#292524,_transparent_60%)] hover:-translate-y-[3px] hover:bg-stone-800 hover:border-stone-900 hover:text-white [background:_transparent] border-2 border-solid border-[color-mix_(in_srgb,_#44403c,_transparent_80%)] before:[background:_linear-gradient(_90deg,_transparent,_rgba(255,255,255,0.2),_transparent)] before:[transition:_left_0.6s_ease]'>
                            Explora Categorías
                        </a>
                    </div>
                    <div class='flex flex-wrap gap-7'>
                        <div class='flex items-center gap-[10px] text-stone-700'>
                            <i class="text-[1.3rem] bi bi-award text-stone-800"></i>
                            <span class='text-[0.95rem] font-medium'>Garantía de Calidad</span>
                        </div>
                        <div class='flex items-center gap-[10px] text-stone-700'>
                            <i class="text-[1.3rem] bi bi-headset text-stone-800"></i>
                            <span class='text-[0.95rem] font-medium'>Soporte 24/7</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class='relative flex items-center justify-center'>
                <div class='relative max-w-[500px]'>
                    <div class='bg-white [box-shadow:_0_20px_60px_color-mix(in_srgb,_#44403c,_transparent_90%)] p-[30px] rounded-3xl relative overflow-hidden [transition:_all_0.3s_ease] before:content-[""] before:absolute before:top-0 before:left-0 before:right-0 before:bottom-0 before:rounded-3xl before:z-[-1] before:[background:linear-gradient(135deg,_color-mix(in_srgb,_#292524,_transparent_98%)_0%,_transparent_50%)] hover:-translate-y-2.5 hover:[box-shadow:_0_30px_80px_color-mix(in_srgb,_#44403c,_transparent_85%)]'>
                        <img src="{{ asset($bestSellers[0]->images->first()->image_path ?? 'img/no-image.jpg') }}"
                            alt="{{ $bestSellers[0]->name ?? 'No Image' }}"
                            class='w-full h-[300px] object-contain mb-5'>
                        <div class='absolute top-5 right-5 [background:_linear-gradient(135deg,_#292524_0%,_color-mix(in_srgb,_#292524,_#000_20%)_100%)] text-white py-2 px-4 rounded-[50px] text-[0.85rem] font-semibold'>
                            Mejor Oferta
                        </div>
                        <div>
                            <h4 class='mb-3 text-[1rem] text-black truncate max-w-[300px]'>{{ $bestSellers[0]->name ?? '' }}</h4>
                            <div class='flex items-center gap-3'>
                                <span class='text-[0.925rem] font-bold text-stone-800'>
                                    S/. {{ $bestSellers[0]->price ?? '' }}
                                </span>
                                <span class='text-[0.9rem] text-stone-500'>
                                    #{{ $bestSellers[0]->code ?? '' }}
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class='absolute top-1/2 -right-[60px] -translate-y-1/2 flex flex-col gap-5'>
                        <div class='w-[120px] h-[120px] bg-white rounded-2xl p-[15px] [box-shadow:_0_10px_30px_color-mix(in_srgb,_#44403c,_transparent_92%)] flex flex-col items-center justify-center relative [transition:_all_0.3s_ease] hover:[transform:_scale(1.1)]'>
                            <img src="{{ asset($bestSellers[1]->images->first()->image_path ?? 'img/no-image.jpg') }}"
                                alt="{{ $bestSellers[1]->name ?? 'No Image' }}"
                                class='w-[60px] h-[60px] object-contain mb-2'>
                            <span class='text-[0.9rem] font-semibold text-stone-800'>
                                S/. {{ $bestSellers[1]->price ?? '' }}
                            </span>
                        </div>
                        <div class='w-[120px] h-[120px] bg-white rounded-2xl p-[15px] [box-shadow:_0_10px_30px_color-mix(in_srgb,_#44403c,_transparent_92%)] flex flex-col items-center justify-center relative [transition:_all_0.3s_ease] hover:[transform:_scale(1.1)]'>
                            <img src="{{ asset($bestSellers[2]->images->first()->image_path ?? 'img/no-image.jpg') }}"
                                alt="{{ $bestSellers[2]->name ?? 'No Image' }}"
                                class='w-[60px] h-[60px] object-contain mb-2'>
                            <span class='text-[0.9rem] font-semibold text-stone-800'>
                                S/. {{ $bestSellers[2]->price ?? '' }}
                            </span>
                        </div>
                    </div>
                    <div class="absolute top-0 left-0 w-full h-full pointer-events-none">
                        <div class="absolute w-[60px] h-[60px] bg-white flex rounded-[50%] items-center justify-center [box-shadow:_0_10px_30px_color-mix(in_srgb,_#44403c,_transparent_90%)] [transition:_all_0.3s_ease] [animation:_float_3s_ease-in-out_infinite] top-[20%] -left-[120px] [animation-delay:_0s] hover:-translate-y-[5px]">
                            <i class="text-2xl bi bi-cart3 text-stone-800"></i>
                            <span class="absolute -top-[5px] -right-[5px] w-5 h-5 bg-red-600 text-white rounded-[50%] flex items-center justify-center text-[0.7rem] font-semibold">
                                3
                            </span>
                        </div>
                        <div class="absolute w-[60px] h-[60px] bg-white flex rounded-[50%] items-center justify-center shadow-[0_10px_30px_color-mix(in_srgb,_#44403c,_transparent_90%)] transition-all duration-300 ease-in [animation:_float_3s_ease-in-out_infinite] top-[60%] -right-[150px] [animation-delay:_1s] hover:-translate-y-[5px]">
                            <i class="text-2xl bi bi-heart text-stone-800"></i>
                        </div>
                        <div class="absolute w-[60px] h-[60px] bg-white flex rounded-[50%] items-center justify-center shadow-[0_10px_30px_color-mix(in_srgb,_#44403c,_transparent_90%)] transition-all duration-300 ease-in [animation:_float_3s_ease-in-out_infinite] bottom-[20%] -left-[100px] [animation-delay:_2s] hover:-translate-y-[5px]">
                            <i class="text-2xl bi bi-search text-stone-800"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div>

    </div>
</x-blog-layout>

{{--
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
--}}
