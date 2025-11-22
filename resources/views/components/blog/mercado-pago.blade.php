<div id="cardPaymentBrick_container"></div>

<script src="https://sdk.mercadopago.com/js/v2"></script>
<script>
    const mp = new MercadoPago("{{ config('services.mercadopago.public_key') }}", {
        locale: "es-PE"
    });

    fetch("/crear-preferencia/{{ $order->id }}")
        .then(res => res.json())
        .then(data => {
            mp.bricks().create("cardPayment", "cardPaymentBrick_container", {
                initialization: {
                    amount: data.amount,
                    preferenceId: data.preference_id,
                },
                callbacks: {
                    onSubmit: (cardFormData) => {
                        cardFormData.order_id = {{ $order->id }};
                        return fetch("/procesar-pago", {
                            method: "POST",
                            headers: {
                                "Content-Type": "application/json",
                                "X-CSRF-TOKEN": "{{ csrf_token() }}"
                            },
                            body: JSON.stringify(cardFormData)
                        })
                        .then(res => res.json())
                        .then(res => {
                            if (res.status === "approved") {
                                alert("Pago aprobado 😎🔥");
                                location.reload(); // refresca para actualizar estado
                            } else {
                                alert("Estado del pago: " + res.status);
                            }
                        });
                    },
                    onError: (error) => console.error(error),
                }
            });
        });
</script>
