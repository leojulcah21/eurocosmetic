<div>
    @if (auth()->user()->hasRole('Customer'))
        {{-- Vista para cliente --}}
        @include('profile.customers.two-factor-customer')
    @else
        {{-- Vista para admin / empleado --}}
        @include('profile.company.two-factor')
    @endif
</div>
