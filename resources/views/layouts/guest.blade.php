<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="w-screen bg-gradient-to-r from-violet-400 to-green-200 h-screen font-sans text-gray-900 antialiased">
        <main class="px-20 py-12 h-screen flex items-center justify-center">
            <section class="w-5/6 grid lg:grid-cols-2 items-center py-12 gap-4 md:grid-cols-1">
                <div class="shadow-lg sm:rounded-l-lg">
                    <img  src="{{URL::asset('/login.png')}}" alt="">
                </div>
                <div class="grid items-center grid-cols-1">
                    {{ $slot }}
                </div>
            </section>
        </main>
    </body>
</html>
