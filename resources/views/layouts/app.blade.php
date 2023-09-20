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
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
                                    
        <script src="https://cdnjs.cloudflare.com/ajax/libs/roundSlider/1.3.2/roundslider.min.js"></script>
    </body>
</html>
