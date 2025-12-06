<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data="{ active: false }">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Eurocosmentic') }}</title>

    <link rel="icon" type="image/png" href="{{ asset('img/icono.png') }}">

    <script src="https://js.hcaptcha.com/1/api.js" async defer></script>

    @include('layouts.partials.fonts')
    @include('layouts.partials.icons')

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
</head>

<body class="flex items-center justify-center min-h-screen p-0 m-0 font-sans no-underline list-none bg-linear-to-r from-stone-50 to-stone-200">
    {{ $slot }}

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @livewireScripts
</body>

</html>
