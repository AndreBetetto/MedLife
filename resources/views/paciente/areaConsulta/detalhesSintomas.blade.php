<!DOCTYPE html>
<html lang="en" class="dark">
    @include('layouts.head')
    <body class="  dark:bg-slate-800">
        @include('layouts.header')
        <main class="pt-24 mx-20">
            <section class="mt-8 flex flex-col gap-8 items-center justify-evenly">
                <h1>Detalhes dos sintomas</h1>
                <div class="w-full px-6 py-3 border-black rounded-xl border">
                    <p>Nome do paciente: <span>Rony Rústico</span></p>
                </div>
                <div class="w-full grid grid-cols-3 grid-rows-4 gap-4 h-36">
                    <div class="rounded-xl border py-3 border-black col-span-2 row-span-4">
                        <form action="" class="grid grid-cols-2">
                            <div class="w-full flex justify-evenly">
                                <label for="">Febre</label>
                                <input type="number" name="" class="h-4 w-4 appearance-none" id="">
                            </div>
                        </form>
                    </div>
                    <div class="rounded-xl border py-3 border-black row-span-1"></div>
                    <div class="rounded-xl border py-3 border-black row-span-3"></div>
            </section>