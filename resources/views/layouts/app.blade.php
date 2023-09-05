<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('layouts.head')
    <body x-cloak x-data="{darkMode: $persist(false)}" :class="{'dark': darkMode === true }" class="font-sans antialiased">
        <div class="min-h-screen">
            @include('layouts.header')

            <!-- Page Content -->
            <main class="py-20">
                {{ $slot }}
            </main>
        </div>
        @include('layouts.footer')
        @livewireScripts
        <script type="text/javascript" src="js/materialize.js"></script>

    </body>
</html>
