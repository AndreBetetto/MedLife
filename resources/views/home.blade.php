<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="px-16 bg-gray-50">
<div class="fixed sm:flex sm:justify-center sm:items-center bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
            @if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-4 text-right z-10">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Registrar</a>
                        @endif
                    @endauth
                </div>
            @endif
</div>
    <main>
        <section class="grid grid-cols-2 mt-14">
            <div>
            <img class="mx-auto" src="doctorsHome.png" alt="Doutor e enfermeiros">
            </div>
            <div class="text-left place-self-center grid gap-8" >
                <h1 class="text-6xl">Melhore sua consulta com a nossa plataforma</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti hic quaerat totam ipsum veniam delectus omnis quos obcaecati, quae atque quam adipisci earum mollitia. Voluptas mollitia laudantium amet modi eius.</p>
            </div>
        </section>
        <section class="grid grid-cols-3">
        <div class="shadow-lg px-16 py-6 flex gap-4 flex-col items-center text-center">
                <h3 class="text-3xl">Eficiência</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit amet officia aliquid quia consequatur error alias voluptate consequuntur nostrum. Quasi repellendus magni ex eligendi aperiam mollitia, amet rerum voluptatem! Adipisci?</p>
            </div>
            
        </section>
    </main>
    <footer>
        <p>sda</p>
    </footer>
</body>
</html>