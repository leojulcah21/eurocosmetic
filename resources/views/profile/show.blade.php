@auth
    @role('Administrator', 'Employee')
        <x-app-layout>
            @include('profile.company.profile')
        </x-app-layout>
    @endrole

    @role('Customer')
        <x-blog-layout>
            @include('profile.customers.profile-customer')
        </x-blog-layout>
    @endrole
@endauth

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
