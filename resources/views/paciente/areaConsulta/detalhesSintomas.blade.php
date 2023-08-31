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
                <div class="w-full grid grid-cols-3 grid-rows-4 h-7">
                    <div class="col-span-2 row-span-4 bg-black">
                    </div>
                    <div class="col-span-1 row-span-1 bg-black"></div>
                </div>
            </section>