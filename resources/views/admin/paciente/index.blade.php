<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-white">
            Área do administrador - Pacientes
        </h2>
    </x-slot>

    <div class="py-12 w-full">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden">
                <div class="p-6">
                    @include('admin.paciente.show')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>