<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        <style>
            body{
                font-family: 'Inter', sans-serif;
            }
        </style>
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
    </head>
<body class=" bg-purple-50">
    @include('layouts.header')
    <main class="px-20">
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
        <section class="grid justify-items-center grid-cols-3  py-8">
        <div class="shadow-lg w-4/5 px-16 py-8 flex gap-4 flex-col items-center text-center">
            <img src="eficiencia.png" class="w-16" alt="">
                <h3 class="text-3xl">Eficiência</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit amet officia aliquid quia consequatur error alias voluptate consequuntur nostrum. Quasi repellendus magni ex eligendi aperiam mollitia, amet rerum voluptatem! Adipisci?</p>
            </div>
            <div class="shadow-lg w-4/5 px-16 py-8 flex gap-4 flex-col items-center text-center">
            <img src="eficiencia.png" class="w-16" alt="">
                <h3 class="text-3xl">Eficiência</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit amet officia aliquid quia consequatur error alias voluptate consequuntur nostrum. Quasi repellendus magni ex eligendi aperiam mollitia, amet rerum voluptatem! Adipisci?</p>
            </div>
            <div class="shadow-lg w-4/5 px-16 py-8 flex gap-4 flex-col items-center text-center">
            <img src="eficiencia.png" class="w-16" alt="">
                <h3 class="text-3xl">Eficiência</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit amet officia aliquid quia consequatur error alias voluptate consequuntur nostrum. Quasi repellendus magni ex eligendi aperiam mollitia, amet rerum voluptatem! Adipisci?</p>
            </div>
        </section>
        <section class="grid gap-10 grid-cols-2 items-center py-8">
            <div>
                <h2 class="text-5xl">Mas afinal,
                <br>
                Por que usar a Medlife?
                </h2>
                <p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis eveniet aperiam voluptatibus incidunt accusamus modi excepturi quos impedit ipsum? Quae nulla consequuntur incidunt cupiditate in assumenda ipsam, reprehenderit doloribus deserunt.</p>
            </div>
            <img class="w-4/5 place-self-center" src="{{URL::asset('/icone.svg')}}" alt="">
        </section>
    </main>
    @include('layouts.footer')
</body>
</html>