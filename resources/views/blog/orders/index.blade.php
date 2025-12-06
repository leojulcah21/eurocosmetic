<x-blog-layout>
    <x-guest.customers.profile-card>
        <div class='px-4 py-2'>
            <div class='flex mt-1'>
                <h2 class='text-lg font-extrabold tracking-wider uppercase'>
                    {{ __('Mis órdenes')}}
                </h2>
            </div>
            <div class="mt-4">
                @forelse ($orders as $order)
                    <div class="p-4 mb-3 border rounded-lg">
                        <p>Orden #{{ $order->id }} - {{ $order->current_status }}</p>
                        <p>Total: S/ {{ number_format($order->total_amount, 2) }}</p>
                    </div>
                @empty
                    <p>No tienes órdenes todavía.</p>
                @endforelse
            </div>
        </div>
    </x-guest.customers.profile-card>
</x-blog-layout>
