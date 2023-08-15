<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-200 font-bold">
                    {{ __("Você está logado!") }}
                </div>
                <div class="p-6 text-gray-900 dark:text-gray-200 lm-0">
                    {{ __("Bem-vindo!") }}
                </div>
                <div class="p-6 text-gray-900 dark:text-gray-200">
                    <div class="lm-0 mb-5">
                        <p>Veja alguns dos nossos especialistas.</p>
                        <p>Caso esteja interessado poderá contatá-los pelo telefone de contato ou pelo nosso endereço</p>
                        <p>R. José dos Santos Godói, 218 - Nucleo Hab. Pres. Geisel, Bauru - SP, 17033-550</p>
                        <p>+55 14 99604-0283</p>
                        <p>(14) 3103-6150</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
