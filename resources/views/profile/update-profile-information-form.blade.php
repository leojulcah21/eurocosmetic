<form wire:submit="updateProfileInformation">
    @if (auth()->user()->hasRole('Customer'))
        @include('profile.customers.update-profile-customer', ['this' => $this])
    @else
        @include('profile.company.update-profile', ['this' => $this])
    @endif
</form>
