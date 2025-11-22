<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Eurocosmetic') }}</title>
    <link rel="icon" type="image/png" href="{{ asset('img/icono.png') }}">

    @include('layouts.partials.fonts')
    @include('layouts.partials.icons')

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
</head>

<body>
    <div class='font-sans antialiased text-stone-95'>
        <div class="flex min-h-screen bg-stone-50">
            <!-- Imagen de fondo -->
            <div class="hidden bg-center bg-cover lg:block lg:w-3/4"
                style="background-image: url('{{ asset('img/backgrounds/auth.jpg') }}');">
            </div>

            <!-- Formulario -->
            <div class="flex flex-col justify-center w-full px-5 py-12 lg:px-2 lg:w-1/2">
                {{ $slot }}
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @stack('modals')
    @livewireScripts
</body>

</html>
