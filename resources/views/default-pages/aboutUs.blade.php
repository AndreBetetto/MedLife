<!DOCTYPE html>
<html lang="en" class="dark">
    @include('layouts.head')
    <body x-cloak x-data="{darkMode: $persist(false)}" :class="{'dark': darkMode === true }" class="font-sans antialiased">
        @include('layouts.header')
        <main class="px-20 pt-24 pb-36 grid place-content-center">
            <section class="dark:text-slate-100 pb-12 pt-12 flex justify-center items-center flex-col gap-6 text-xl">
                <h1 class="text-6xl">NOSSA EQUIPE</h1>
                <p class="text-center w-3/5">O projeto foi desenvolvido pelos alunos do Colégio Técnico Industrial Prof. Isaac Portal Roldan (CTI - UNESP) como um Trabalho de Conclusão de Curso (TCC), visando a aplicação prática dos conhecimentos adquiridos durante o curso. </p>
                <div class="grid grid-cols-2 gap-5">
                    <div class="flex w-full my-6 gap-10">
                        <img alt="Andre" src="andre.jpeg" class="rounded-lg" width="200px">
                        <div class="flex flex-col gap-6">
                            <div>
                                <p class="font-bold">André Luis Oliveira Betetto</p>
                                <p class="">Desenvolvedor web</p>
                            </div>
                            <p class="">andre.betetto@unesp.br</p>
                        </div>
                    </div>
                    <div class="flex w-full my-6 gap-10">
                        <img alt="Gabriele" src="gabriele.jpg" class="rounded-lg h-[200px]" width="200px">
                        <div class="flex flex-col gap-6">
                            <div>
                                <p class="font-bold">Gabriela de Lima</p>
                                <p class="">Desenvolvedora web</p>
                            </div>
                            <p class="">gabriele.lima05@unesp.br</p>
                        </div>
                    </div>
                    <div class="flex w-full my-6 gap-10">
                        <img alt="Maria Luisa" src="marialueid.jpeg" class="rounded-lg" width="200px">
                        <div class="flex flex-col gap-6">
                            <div>
                                <p class="font-bold">Maria Luísa Eid Martins</p>
                                <p class="">Desenvolvedora web</p>
                            </div>
                            <p class="">luisa.eid@unesp.br</p>
                        </div>
                    </div>
                    <div class="flex w-full my-6 gap-10">
                        <img alt="Miguel" src="miguel.jpeg" class="rounded-lg" width="200px">
                        <div class="flex flex-col gap-6">
                            <div>
                                <p class="font-bold">Miguel de Oliveira Correia</p>
                                <p class="">Desenvolvedor web</p>
                            </div>
                            <p class="">mo.correia@unesp.br</p>
                        </div>
                    </div>
                    <div class="flex w-full my-6 gap-10">
                        <img alt="Naydhow" src="naydhow.jpeg" class="rounded-lg" width="200px">
                        <div class="flex flex-col gap-6">
                            <div>
                                <p class="font-bold">Naydhow Roberto Mascareli Bertaglia</p>
                                <p class="">Líder técnico</p>
                            </div>
                            <p class="">naydhow.bertaglia@unesp.br</p>
                        </div>
                    </div>
                    <div class="flex w-full my-6 gap-10">
                        <img alt="Vitória" src="vitoria.jpg" class="rounded-lg" width="200px">
                        <div class="flex flex-col gap-6">
                            <div>
                                <p class="font-bold">Vitória Vieira da Silva</p>
                                <p class="">Líder gerencial</p>
                            </div>
                            <p class="">vitoria.vieira@unesp.br</p>
                        </div>
                    </div>
                </div>  
            </section>
        </main>
    @include('layouts.footer')
    </body>
</html>