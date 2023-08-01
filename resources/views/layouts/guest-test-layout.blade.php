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
    <body class="w-screen h-screen flex justify-center items-center font-sans text-gray-900 antialiased">
      <div class="w-full h-full flex justify-center items-center">
        <div class="w-3/5 bg-gray-200 flex justify-center items-center flex-col h-full">
          <div class="fixed left-10 top-5">
            <a href="/"><x-application-logo class="w-1/2" /></a>
          </div>
          <h1>Acalmem-se bebês! São apenas testes :D</h1>
          <div class="w-2/5">
            {{ $slot }}
          </div>
        </div>
        <div class="w-2/5 bg-purple-200 flex justify-center items-center flex-col h-full">
          <img class="h-4/5" src="{{URL::asset('/login.png')}}" alt="">
        </div>
      </div>
    </body>
</html>
