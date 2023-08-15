<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class=" bg-gray-50">
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
    <main class="px-20 mt-14">
        <section class="grid grid-cols-2 items-center pb-6">
            <div>
            <img class="mx-auto" src="doctorsHome.png" alt="Doutor e enfermeiros">
            </div>
            <div class="text-left flex flex-col gap-12" >
                <h1 class="text-6xl">Otimize sua consulta com a nossa plataforma</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti hic quaerat totam ipsum veniam delectus omnis quos obcaecati, quae atque quam adipisci earum mollitia. Voluptas mollitia laudantium amet modi eius.</p>
                <div class="flex gap-10">
                    <a href="{{ route('login') }}" class="text-xl rounded-2xl px-8 py-2 w-max bg-violet-500 content-center gap-2 hover:bg-violet-600 hover:px-10 duration-200 ">Entrar <span class="align-middle material-symbols-outlined">arrow_right_alt</span></a>
                    <a href="{{ route('register') }}" class="text-xl rounded-2xl px-8 py-2 w-max bg-green-300 content-center gap-2 hover:bg-green-400 hover:px-10 duration-200">Fazer cadastro</a>
                </div>
            </div>
        </section>
        <section class="grid justify-items-center grid-cols-3  yx-6">
        <div class="shadow-lg w-4/5 px-16 py-6 flex gap-4 flex-col items-center text-center">
            <img src="eficiencia.png" class="w-16" alt="">
                <h3 class="text-3xl">Eficiência</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit amet officia aliquid quia consequatur error alias voluptate consequuntur nostrum. Quasi repellendus magni ex eligendi aperiam mollitia, amet rerum voluptatem! Adipisci?</p>
            </div>
            <div class="shadow-lg w-4/5 px-16 py-6 flex gap-4 flex-col items-center text-center">
            <img src="eficiencia.png" class="w-16" alt="">
                <h3 class="text-3xl">Eficiência</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit amet officia aliquid quia consequatur error alias voluptate consequuntur nostrum. Quasi repellendus magni ex eligendi aperiam mollitia, amet rerum voluptatem! Adipisci?</p>
            </div>
            <div class="shadow-lg w-4/5 px-16 py-6 flex gap-4 flex-col items-center text-center">
            <img src="eficiencia.png" class="w-16" alt="">
                <h3 class="text-3xl">Eficiência</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit amet officia aliquid quia consequatur error alias voluptate consequuntur nostrum. Quasi repellendus magni ex eligendi aperiam mollitia, amet rerum voluptatem! Adipisci?</p>
            </div>
        </section>
        <section class="grid gap-10 grid-cols-2 items-center py-6">
            <div>
                <h2 class="text-5xl">Mas afinal,
                <br>
                Por que usar a Medlife?
                </h2>
                <p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis eveniet aperiam voluptatibus incidunt accusamus modi excepturi quos impedit ipsum? Quae nulla consequuntur incidunt cupiditate in assumenda ipsam, reprehenderit doloribus deserunt.</p>
            </div>
            <img class="w-full" src="{{URL::asset('/icone.svg')}}" alt="">
        </section>
    </main>
    <footer class="px-20 bg-purple-300 py-6 grid grid-cols-3">
        <img class="w-full" src="{{URL::asset('/icone.svg')}}" alt="">
        <div>
            <ul class="h-full w-full items-center flex flex-col gap-6">
                <li class="text-xl">Acesse</li>
                <li class="text-xl">
                    <a href="">Home</a>
                </li>
                <li class="text-xl">
                    <a href="">Login</a>
                </li>
                <li class=  "text-xl">
                    <a href="">Sobre nós</a>
                </li>
            </ul>
        </div>
        <div class="items-center flex flex-col gap-">
            <h2 class="text-xl">Contate-nos</h2>
            <p class="align-middle"><span class="align-middle material-symbols-outlined">
                mail
                </span>
                email@email.com
            </p>
        </div>
    </footer>
</body>
</html>