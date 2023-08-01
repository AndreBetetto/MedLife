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
    <body class="w-screen bg-gradient-to-r from-violet-400 to-green-200 h-screen flex justify-center items-center font-sans text-gray-900 antialiased">
        <div class="w-4/5  h-4/6 flex justify-center items-center">
            <div class="w-2/5 flex justify-center items-center flex-col h-full  shadow-inner overflow-hidden sm:rounded-r-lg">
                {{ $slot }}
            </div>
            <div class="w-2/5 shadow-lg sm:rounded-l-lg">
                <img class="h-4/5" src="{{URL::asset('/login.png')}}" alt="">
            </div>
        </div>
    </body>
</html>
