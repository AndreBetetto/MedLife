<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('layouts.head')
    <body x-cloak x-data="{darkMode: $persist(false)}" :class="{'dark': darkMode === true }" class="font-sans antialiased">
        @include('layouts.header')
        <div class="min-h-screen">
            <main class="flex py-20 justify-center">
                {{ $slot }}
            </main>
        </div>
        @include('layouts.footer')
        @livewireScripts
    </body>
</html>
