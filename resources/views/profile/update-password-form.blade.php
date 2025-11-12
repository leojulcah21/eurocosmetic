<form wire:submit="updatePassword">
    @if (auth()->user()->hasRole('Customer'))
        {{-- Vista para cliente --}}
        @include('profile.customers.update-password-customer')
    @else
        {{-- Vista para admin / empleado --}}
        @include('profile.company.update-password')
    @endif
</form>


