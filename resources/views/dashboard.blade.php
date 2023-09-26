<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden">
                <div class="p-6 dark:text-gray-200 font-bold">
                    {{ __("Você está logado!") }}
                </div>
                <div class="p-6 dark:text-gray-200 lm-0">
                    {{ __("Bem-vindo!") }}
                </div>
                <div class="p-6 dark:text-gray-200">
                    <div class="lm-0 mb-5">
                        <p>Veja alguns dos nossos especialistas.</p>
                        <p>Caso esteja interessado poderá contatá-los pelo telefone de contato ou pelo nosso endereço</p>
                        
                        <div class="flex items-center">
                            <i class="material-icons py-3 mr-1">location_on</i>
                            <label class="mb-1 text-lg">R. José dos Santos Godói, 218 - Nucleo Hab. Pres. Geisel, Bauru - SP, 17033-550</label>
                        </div>

                        <div class="flex items-center">
                            <i class="material-icons py-3 mr-1">phone</i>
                            <label class="mb-1 text-lg">+55 14 99604-0283</label>
                        </div>
                            
                        <div class="flex items-center">
                            <i class="material-icons py-3 mr-1">phone_iphone</i>
                            <label class="mb-1 text-lg">(14) 3103-6150</label>
                        </div>
                            
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
