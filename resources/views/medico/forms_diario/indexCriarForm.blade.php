
<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            indexCriarForm
        </h2>
    </x-slot>
    <div class="py-12 w-full">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden dark:bg-slate-800 shadow-sm sm:rounded-lg">
                <div class="p-6 border-b border-gray-200 bg-white dark:bg-slate-800">
                    @include('medico.forms_diario.criarForm')    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>