<x-app-layout>
    <x-slot name="header">
        <h6 class="mb-0 text-xl font-[550] capitalize text-stone-950">
            {{ __('Dashboard') }}
        </h6>
    </x-slot>

    <div class="w-full p-6 mx-auto">
        <div class='relative flex flex-col items-center justify-center flex-auto min-w-0 mx-6 overflow-hidden break-words bg-white border-0 shadow-lg rounded-2xl bg-clip-border'>
            @auth
                <x-welcome-auth-company class='py-16' />
            @else
                <x-welcome class='py-16' />
            @endauth
        </div>
    </div>
</x-app-layout>

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



