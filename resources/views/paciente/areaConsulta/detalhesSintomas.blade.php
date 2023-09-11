<!DOCTYPE html>
<html lang="en" class="dark">
    @include('layouts.head')
    <body class="  dark:bg-slate-800">
        @include('layouts.header')
        <main class="text-black pt-24 pb-12 mx-20">
            <section class="mt-8 flex flex-col gap-12 items-center justify-evenly">
                <h1 class="text-3xl">Detalhes dos sintomas</h1>
                <div class="w-full px-6 py-6 border-black rounded-xl border">
                    <p>Nome do paciente: <span>Rony Rústico</span></p>
                </div>
                <form action="" class="w-full grid grid-cols-3 grid-rows-4 gap-8 ">
                    <div class="flex justify-center items-center flex-col gap-8 px-6 py-5 rounded-xl border border-black col-span-2 row-span-4">
                        <h2 class="text-xl text-black">Sintomas</h2>
                        <div class="w-3/4 gap-x-60 gap-y-8 grid grid-cols-2">
                            <div class="w-full flex justify-between">
                                <label for="febre" class="text-lg text-black">Febre</label>
                                <input type="number" name="febre" class="h-4 w-4" id="febre">
                            </div>
                            <div class="w-full flex justify-between">
                                    <label for="dorCabeca" class="text-lg text-black">Dor de cabeça</label>
                                    <input type="checkbox" name="dorCabeca" class="opacity-100 static pointer-events-auto" id="dorCabeca">
                            </div>
                            <div class="w-full flex justify-between">
                                    <label for="diarreia" class="text-lg text-black">Diarréia</label>
                                    <input type="checkbox" name="diarreia" class="opacity-100 static pointer-events-auto" id="diarreia">
                            </div>
                            <div class="w-full flex justify-between">
                                    <label for="tontura" class="text-lg text-black">Tontura</label>
                                    <input type="checkbox" name="tontura" class="opacity-100 static pointer-events-auto" id="tontura">
                            </div>
                            <div class="w-full flex justify-between">
                                    <label for="vomito" class="text-lg text-black">Vômito</label>
                                    <input type="checkbox" name="vomito" class="opacity-100 static pointer-events-auto" id="">
                            </div>
                            <div class="w-full flex justify-between">
                                    <label for="tosse" class="text-lg text-black">Tosse</label>
                                    <input type="checkbox" name="tosse" class="opacity-100 static pointer-events-auto" id="tosse">
                            </div>
                            <div class="w-full flex justify-between">
                                    <label for="dorGarganta" class="text-lg text-black">Dor de garganta</label>
                                    <input type="checkbox" name="dorGarganta" class="opacity-100 static pointer-events-auto" id="dorGarganta">
                            </div>
                            <div class="w-full flex justify-between">
                                    <label for="dorOuvido" class="text-lg text-black">Dor de ouvido</label>
                                    <input type="checkbox" name="dorOuvido" class="opacity-100 static pointer-events-auto" id="dorOuvido">
                            </div>
                        </div>
                    </div>
                    <div class="flex  items-center justify-start px-6 py-5 rounded-xl border border-black row-span-1">

                        <label for="" class="text-lg h-fit text-black">Data: </label>
                        <input class="m-0 h-5" type="date" name="" id="">
                    </div>
                    <div class="flex flex-col justify-around items-center rounded-xl border px-6 py-5 border-black row-span-3 fle">
                        <h2 class="text-xl ">Consultou o médico</h2>
                        <div class="flex justify-between gap-12 w-fit">
                            <div class="flex items-center gap-2">
                                <input class="opacity-100 static pointer-events-auto" type="radio" name="op" id="sim">
                                <label class="text-lg text-black" for="sim">Sim</label>
                            </div>
                            <div class="flex items-center gap-2">
                                <input class="opacity-100 static pointer-events-auto" type="radio" name="op" id="não">
                                <label class="text-lg text-black"for="sim">Não</label>
                            </div>
                        </div>
                    </div>
                    
                    <input class="col-span-3 py-1.5 px-24 rounded-md bg-violet-400 place-self-center cursor-pointer" type="submit" value="Enviar">
                </form >
            </section>
        </main>
        @include('layouts.footer')
    </body>
</html>