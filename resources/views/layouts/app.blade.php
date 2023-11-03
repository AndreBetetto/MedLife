<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('layouts.head')
    <body x-cloak x-data="{darkMode: $persist(false)}" :class="{'dark': darkMode === true }" class="font-sans antialiasedz">
        <x-user-type-badge />
        @include('layouts.header')
            <main class="flex py-20 justify-center min-h-screen">
                {{ $slot }}
                <x:chat.modal-show/>
            </main>
        @include('layouts.footer')
        @livewireScripts     
    </body>
</html>
