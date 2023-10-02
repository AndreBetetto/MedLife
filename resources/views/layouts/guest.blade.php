<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('layouts.head')
    <body class="w-screen bg-violet-500 h-screen font-sans text-gray-900 antialiased">
        
        <main class="h-full grid justify-items-center content-center place-items-center">
            <section class="bg-violet-100 w-2/3 grid grid-cols-5">
                <div class="bg-gray-100 col-span-2 grid items-center grid-cols-1">
                    {{ $slot }}
                </div>
                <div class="col-span-3">
                    <img  src="{{URL::asset('/login.png')}}" alt="">
                </div>
            </section>
        </main>
    </body>
</html>
