<div>
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 dark:text-gray-200 font-bold">
            <div class="flex justify-between space-x-5 py-5">
                <div class="">
                    <a href="{{ route('crudUser.index') }}" class="inline-block rounded bg-purple-300 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-purple-300 transition duration-150 ease-in-out hover:bg-purple-500 hover:shadow-purple-600 focus:bg-primary-600 focus:outline-none focus:ring-0 active:bg-primary-700">Usuários</a>
                    <a href="{{ route('crudPaciente.index') }}" class="inline-block rounded bg-purple-300 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-purple-300 transition duration-150 ease-in-out hover:bg-purple-500 hover:shadow-purple-600 focus:bg-primary-600 focus:outline-none focus:ring-0 active:bg-primary-700">Pacientes</a>
                    <a href="{{ route('adminmedico.index') }}" class="inline-block rounded bg-purple-300 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-purple-300 transition duration-150 ease-in-out hover:bg-purple-500 hover:shadow-purple-600 focus:bg-primary-600 focus:outline-none focus:ring-0 active:bg-primary-700">Médicos</a>
                </div>
            </div>
            @livewire('search-paciente', ['pacientes' => $pacientes])
        </div>
    </div>
</div>
