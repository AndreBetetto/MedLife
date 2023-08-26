<!DOCTYPE html>
<html lang="en">
    @include('layouts.head')
    <body class=" bg-purple-50 dark:bg-slate-800">
        @include('layouts.header')
            <main class="px-20 py-12">
                <section class="grid grid-cols-2 items-center pb-12 pt-12">
                    <img class="w-11/12 place-self-center m-0" src="doctorsHome.png" alt="Doutor e enfermeiros">
                    <div class="text-left flex flex-col gap-12" >
                        <h1 class="text-6xl dark:text-white">Otimize sua consulta com a nossa plataforma</h1>
                        <p class="dark:text-slate-100">A aplicação do software em ambientes profissionais possibilita que haja um melhor atendimento das necessidades do paciente, promovendo consultas mais precisas e com maior acompanhamento do mesmo, evitando que dados importantes não sejam registrados.</p>
                        <div class="flex gap-10 ">
                            <a href="{{ route('login') }}" class="text-xl text-neutral-50 rounded-2xl px-8 py-2 w-max bg-violet-500 content-center gap-2 hover:bg-violet-600 hover:px-10 duration-200 ">Entrar <span class="align-middle material-symbols-outlined">arrow_right_alt</span></a>
                            <a href="{{ route('register') }}" class="text-xl rounded-2xl px-8 py-2 w-max bg-green-300 content-center gap-2 hover:bg-green-400 hover:px-10 duration-200">Fazer cadastro</a>
                        </div>
                    </div>
                </section>
                <section class="grid justify-items-center grid-cols-3 py-48">
                    <div class="shadow-lg w-4/5 px-16 py-8 flex gap-4 flex-col items-center text-center">
                        <img src="eficiencia.svg" class="w-16 dark:fill-white" alt="">
                        <h3 class="text-3xl dark:text-white">Eficiência</h3>
                        <p class="dark:text-slate-100">Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit amet officia aliquid quia consequatur error alias voluptate consequuntur nostrum. Quasi repellendus magni ex eligendi aperiam mollitia, amet rerum voluptatem! Adipisci?</p>
                    </div>
                    <div class="shadow-lg w-4/5 px-16 py-8 flex gap-4 flex-col items-center text-center">
                        <img src="eficiencia.svg" class="w-16 fill-white" alt="">
                        <h3 class="text-3xl dark:text-white">Eficiência</h3>
                        <p class="dark:text-slate-100">Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit amet officia aliquid quia consequatur error alias voluptate consequuntur nostrum. Quasi repellendus magni ex eligendi aperiam mollitia, amet rerum voluptatem! Adipisci?</p>
                    </div>
                    <div class="shadow-lg w-4/5 px-16 py-8 flex gap-4 flex-col items-center text-center">
                        <img src="eficiencia.svg" class="w-16" alt="">
                        <h3 class="text-3xl dark:text-white">Eficiência</h3>
                        <p class="dark:text-slate-100">Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit amet officia aliquid quia consequatur error alias voluptate consequuntur nostrum. Quasi repellendus magni ex eligendi aperiam mollitia, amet rerum voluptatem! Adipisci?</p>
                    </div>
                </section>
                <section class="grid gap-10 grid-cols-2 items-center py-48">
                    <div>
                        <h2 class="mb-12 text-5xl dark:text-white">Mas afinal,
                            <br>
                            Por que usar a Medlife?
                        </h2>
                        <p class="text-justify dark:text-slate-100">Para minimizar a demora ao recolher informações do paciente, as quais serão já disponibilizadas anteriormente à consulta, de forma que a torne mais rápida e eficiente, uma vez que o profissional terá acesso ao histórico diário de sintomas do paciente de forma precisa</p>
                    </div>
                    <img class="w-4/5 place-self-center" src="{{URL::asset('/icone.svg')}}" alt="">
                </section>
            </main>
        @include('layouts.footer')
    </body>
</html>