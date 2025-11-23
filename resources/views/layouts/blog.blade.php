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

<body class="relative p-0 m-0 font-sans bg-white text-stone-950">
    <header id="header" class="sticky top-0 z-50 bg-white shadow">
        <x-blog.top-bar class='bg-stone-100'/>

        <x-blog.header class='bg-white border-b'/>

        <x-blog.nav class='bg-stone-950' />

        <!-- Mobile Search Form -->
        <div id="mobileSearch" class="hidden bg-white border-b">
            <div class="container px-4 py-2 mx-auto max-w-7xl">
                <form class="flex">
                    <input type="text" class="flex-1 px-3 py-2 border rounded-l focus:outline-none"
                        placeholder="Search for products">
                    <button class="px-4 py-2 text-white bg-blue-600 rounded-r hover:bg-blue-700" type="submit">
                        <i class="bi bi-search"></i>
                    </button>
                </form>
            </div>
        </div>
    </header>

    @if (!empty($header))
        <div class='relative py-[25px] px-0 bg-red-50 text-stone-950'>
            <div class='container relative py-2 mx-auto max-w-screen-2xl'>
                <div class='items-center justify-between lg:flex'>
                    <h1 class='mb-2 text-2xl font-bold tracking-wider lg:mb-0'>
                        {{ $header }}
                    </h1>
                    <nav>
                        <ol class='flex flex-wrap p-0 m-0 text-[14px] list-none font-[400]'>
                            <li>
                                <a href="{{ route('home') }}">
                                    {{ __('Home') }}
                                </a>
                            </li>
                            <li class='ps-2.5 before:content-["/"] inline-block before:pe-2.5 before:text-stone-700'>
                                {{ __('Profile') }}
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    @endif
    <div class='text-stone-950 bg-[#fdfdfd] py-[60px] px-0 overflow-clip scroll-mt-[90px]'>
        {{ $slot }}
    </div>

    <x-blog.footer class='text-gray-300 transition-all duration-700 ease-in-out bg-stone-950' />

    <!-- <x-chatbot.euro-bot class='bg-red-50' />

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if(Auth::check())
        <script>console.log("USER OK")</script>
    @else
        <script>console.log("NO LOGUEADO")</script>
    @endif

    @php
        $currentUser = null;

        if (Auth::check() && Auth::user()->hasRole('Customer')) {
            $u = Auth::user();
            $c = $u->customer;

            $currentUser = [
                'name' => $u->name,
                'username' => $u->username,
                'email' => $u->email,
                'status' => $u->status,
                'role' => $u->role->name,
                'dni' => $c->dni,
                'phone' => $c->phone,
                'has_salon' => $c->has_salon,
                'property_type' => $c->property_type,
                'business_name' => $c->business_name,
                'birth_date' => $c->birth_date,
                'last_purchase_receipts' => $c->last_purchase_receipts,
            ];
        }
    @endphp

    <script>
        window.currentUser = @json($currentUser);
    </script>


    <script src="https://cdn.botpress.cloud/webchat/v3.4/inject.js"></script>
    <script src="https://files.bpcontent.cloud/2025/11/19/15/20251119151831-DBYDITLX.js" defer></script> -->
    @livewireScripts
</body>

</html>
