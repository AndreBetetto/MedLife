<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('layouts.head')
    <body class="w-screen bg-gradient-to-r from-violet-400 to-green-200 h-screen font-sans text-gray-900 antialiased">
        @include('layouts.header')
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
