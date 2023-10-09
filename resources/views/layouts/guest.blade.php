<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('layouts.head')
    <body class="w-screen bg-gradient-to-r from-violet-500 to-fuchsia-400 h-screen font-sans text-gray-900 antialiased">
        <main class="h-full grid justify-items-center content-center place-items-center">
            <div class="rounded-md shadow-2xl shadow-gray-600 bg-violet-100 w-2/3 grid grid-cols-5">
                <div class="rounded-md bg-gray-100 dark:bg-slate-800 col-span-2 grid items-center grid-cols-1">
                    {{ $slot }}
                </div>
                <div class="col-span-3">
                    <img  src="{{URL::asset('/login.png')}}" alt="">
                </div>
            </div>
        </main>
    </body>
</html>
