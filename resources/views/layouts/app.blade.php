<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('layouts.head')
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.header')

            <!-- Page Content -->
            <main class="py-20">
                {{ $slot }}
            </main>
        </div>
        @include('layouts.footer')
        @livewireScripts
    </body>
</html>
