<!DOCTYPE html>
<html lang="en" class="dark">
    @include('layouts.head')
    <body class="  dark:bg-slate-800">
        @include('layouts.header')
        <main class="pt-24 pb-12 mx-20">
            <section class="mt-8 flex flex-col gap-8 items-center justify-evenly">
                <h1>Detalhes dos sintomas</h1>
                <div class="w-full px-6 py-3 border-black rounded-xl border">
                    <p>Nome do paciente: <span>Rony Rústico</span></p>
                </div>
                <div class="w-full grid grid-cols-3 grid-rows-4 gap-4 ">
                    <div class="flex justify-center items-center flex-col gap-8 rounded-xl border border-black col-span-2 row-span-4">
                        <h1 class="text-xl text-black">Sintomas</h1>
                        <form action="" class="w-3/4 gap-6 grid grid-cols-2">
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
                        </form>
                    </div>
                    <div class="flex justify-start rounded-xl border py-3 border-black row-span-1">
                        <label for="" class="text-lg">Data: </label>
                        <input type="date" name="" id="">
                    </div>
                    <div class="rounded-xl border py-3 border-black row-span-3"></div>
            </section>
        </main>
        @include('layouts.footer')
    </body>
</html>