<!DOCTYPE html>
<html lang="en" class="dark">
    @include('layouts.head')
    <body class="  dark:bg-slate-800">
        @include('layouts.header')
        <main class="text-black pt-24 pb-12 mx-20">
            <section class="mt-8 flex flex-col gap-8 items-center justify-evenly">
                <h1 class="text-3xl">Detalhes dos sintomas</h1>
                <div class="w-full px-6 py-3 border-black rounded-xl border">
                    <p>Nome do paciente: <span>Rony Rústico</span></p>
                </div>
                <form action="" class="w-full grid grid-cols-3 grid-rows-4 gap-4 ">
                    <div class="flex justify-center items-center flex-col gap-8 px-6 py-3 rounded-xl border border-black col-span-2 row-span-4">
                        <h2 class="text-xl text-black">Sintomas</h2>
                        <div class="w-3/4 gap-x-60 gap-y-8 grid grid-cols-2">
                            <div class="w-full flex justify-between">
                                <label for="febre" class="text-lg text-black">Febre</label>
                                <input type="number" name="febre" class="h-4 w-6" id="febre">
                            </div>
                            <div class="w-full flex justify-between">
                                    <label for="dorCabeca" class="text-lg text-black">Dor de cabeça</label>
                                    <input type="number" name="dorCabeca" class="h-4 w-6" id="dorCabeca">
                            </div>
                            <div class="w-full flex justify-between">
                                    <label for="diarreia" class="text-lg text-black">Diarréia</label>
                                    <input type="number" name="diarreia" class="h-4 w-6" id="diarreia">
                            </div>
                            <div class="w-full flex justify-between">
                                    <label for="tontura" class="text-lg text-black">Tontura</label>
                                    <input type="number" name="tontura" class="h-4 w-6" id="tontura">
                            </div>
                            <div class="w-full flex justify-between">
                                    <label for="vomito" class="text-lg text-black">Vômito</label>
                                    <input type="number" name="vomito" class="h-4 w-6" id="">
                            </div>
                            <div class="w-full flex justify-between">
                                    <label for="tosse" class="text-lg text-black">Tosse</label>
                                    <input type="number" name="tosse" class="h-4 w-6" id="tosse">
                            </div>
                            <div class="w-full flex justify-between">
                                    <label for="dorGarganta" class="text-lg text-black">Dor de garganta</label>
                                    <input type="number" name="dorGarganta" class="h-4 w-6" id="dorGarganta">
                            </div>
                            <div class="w-full flex justify-between">
                                    <label for="dorOuvido" class="text-lg text-black">Dor de ouvido</label>
                                    <input type="number" name="dorOuvido" class="h-4 w-6" id="dorOuvido">
                            </div>
                        </div>
                    </div>
                    <div class="flex  items-center justify-start px-6 py-3 rounded-xl border border-black row-span-1">

                        <label for="" class="text-lg h-fit text-black">Data: </label>
                        <input class="m-0 h-5" type="date" name="" id="">
                    </div>
                    <div class="flex flex-col justify-around items-center rounded-xl border px-6 py-3 border-black row-span-3 fle">
                        <h2 class="text-xl ">Consultou o médico</h2>
                        <div class="flex justify-between gap-12 w-fit">
                            <div class="flex items-center gap-2">
                                <input class="opacity-100 static" type="radio" name="op" id="sim">
                                <label class="text-lg text-black" for="sim">Sim</label>
                            </div>
                            <div class="flex items-center gap-2">
                                <input class="opacity-100 static" type="radio" name="op" id="não">
                                <label class="text-lg text-black"for="sim">Não</label>
                            </div>
                        </div>
                    </div>
                    
                    <input class="col-span-3 py-1.5 rounded-md bg-violet-400 w-1/4 place-self-center" type="submit" value="Enviar">
                </form >
            </section>
        </main>
        @include('layouts.footer')
    </body>
</html>