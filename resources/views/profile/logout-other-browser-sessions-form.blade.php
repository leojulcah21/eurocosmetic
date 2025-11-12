<div>
    @if (auth()->user()->hasRole('Customer'))
        {{-- Vista para cliente --}}
        @include('profile.customers.logout-other-sessions-customer')
    @else
        {{-- Vista para admin / empleado --}}
        @include('profile.company.logout-other-sessions')
    @endif
</div>

