@props(['class' => ''])
<div class="{{ $class }}">
    <x-dropdown-link class="flex items-center px-4 py-2 hover:bg-gray-100" href="{{ route('profile.show') }}">
        <i class="mr-2 bi bi-person-circle"></i> My Profile
    </x-dropdown-link>
    <x-dropdown-link class="flex items-center px-4 py-2 hover:bg-gray-100" href="#">
        <i class="mr-2 bi bi-bag-check"></i> My Orders
    </x-dropdown-link>
    <x-dropdown-link class="flex items-center px-4 py-2 hover:bg-gray-100" href="#">
        <i class="mr-2 bi bi-heart"></i> My Wishlist
    </x-dropdown-link>
    <x-dropdown-link class="flex items-center px-4 py-2 hover:bg-gray-100" href="#">
        <i class="mr-2 bi bi-gear"></i> Settings
    </x-dropdown-link>
</div>
