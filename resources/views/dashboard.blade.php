<x-app-layout>
    <x-slot name="header">
        <h5 class="hidden text-xl font-medium text-gray-600 lg:block">
            {{ __('Dashboard') }}
        </h5>
    </x-slot>

    <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
        <x-welcome />
    </div>
</x-app-layout>
