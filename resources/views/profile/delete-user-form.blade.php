<div>
    @if (auth()->user()->hasRole('Customer'))
        {{-- Vista para cliente --}}
        @include('profile.customers.delete-customer')
    @else
        {{-- Vista para admin / empleado --}}
        @include('profile.company.delete-company-user')
    @endif
</div>
