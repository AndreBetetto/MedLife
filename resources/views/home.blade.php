<!DOCTYPE html>
<html lang="en">
    @include('layouts.head')
    <body x-cloak x-data="{darkMode: $persist(false)}" :class="{'dark': darkMode === true }" class="bg-purple-50 dark:bg-slate-800 antialiased">
        @include('layouts.header')
            <main class="px-20 py-12">
                <section class="grid lg:grid-cols-2 items-center py-12 gap-4 md:grid-cols-1">
                    <img class="w-11/12 place-self-center m-0" src="doctorsHome.png" alt="Doutor e enfermeiros">
                    <div class="text-left flex flex-col gap-12" >
                        <h1 class="text-6xl dark:text-white">Otimize sua consulta com a nossa plataforma</h1>
                        <p class="dark:text-slate-100">A aplicação do software em ambientes profissionais possibilita que haja um melhor atendimento das necessidades do paciente, promovendo consultas mais precisas e com maior acompanhamento do mesmo, evitando que dados importantes não sejam registrados.</p>
                        <div class="flex gap-10">
                            <a href="{{ route('login') }}" class="text-xl text-neutral-50 rounded-2xl px-8 py-2 w-max bg-violet-500 content-center gap-2 hover:bg-violet-600 hover:px-10 duration-200">Entrar <span class="align-middle material-symbols-outlined">arrow_right_alt</span></a>
                            <a href="{{ route('register') }}" class="text-xl rounded-2xl px-8 py-2 w-max bg-green-300 content-center gap-2 hover:bg-green-400 hover:px-10 duration-200">Fazer cadastro</a>
                        </div>
                    </div>
                    <label>Disponível para Viajar?</a>
                        <select class="dark:bg-slate-800" name="viagem">
                            <option value="sim">Sim</option>
                            <option value="nao">Não</option>
                        </select>
                    </label>
                </section>
                <section class="grid justify-items-center lg:grid-cols-3 py-48 md:grid-cols-1">
                    <div class="shadow-lg w-4/5 px-16 py-8 flex gap-4 flex-col items-center text-center">
                        <img src="eficiencia.svg" class="w-16" alt="">
                        <h3 class="text-3xl dark:text-white">O Fim das Barreiras na Saúde</h3>
                        <p class="dark:text-slate-100">Supere as Dificuldades de Comunicação Médica! Descubra como a MedLife proporciona ferramentas que aproximam médicos e pacientes para um tratamento mais eficaz.</p>
                    </div>
                    <div class="shadow-lg w-4/5 px-16 py-8 flex gap-4 flex-col items-center text-center">
                        <img src="eficiencia.svg" class="w-16 fill-white" alt="">
                        <h3 class="text-3xl dark:text-white">Soluções que Transformam Consultas</h3>
                        <p class="dark:text-slate-100">Médicos, Simplifiquem as Consultas! Explore como a MedLife oferece tecnologias que otimizam as consultas médicas, tornando-as mais produtivas e informativas.</p>
                    </div>
                    
                    <div class="shadow-lg w-4/5 px-16 py-8 flex gap-4 flex-col items-center text-center">
                        <img src="eficiencia.svg" class="w-16" alt="">
                        <h3 class="text-3xl dark:text-white">Conecte-se para Cuidados de Excelência</h3>
                        <p class="dark:text-slate-100">Conecte-se com Seus Pacientes de Forma Poderosa! Descubra como a MedLife melhora a comunicação médico-paciente, permitindo cuidados de saúde excepcionais.</p>
                    </div>
                </section>
                <section class="grid gap-12 lg:grid-cols-2 items-center py-48 md:grid-cols-1">
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