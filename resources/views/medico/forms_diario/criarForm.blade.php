<div class="grid grid-cols-1 gap-4 justify-center items-center ">
    <h1 class="text-3xl font-bold text-center">Criando formulário para paciente</h1>
    <form action="{{ route('areamedico.passarParaPaciente')}}" method='POST' enctype="multipart/form-data">
        @csrf
        <div class="form-group dark:bg-slate-800 grid gap-4">
            <div class="grid gap-2">
                <input type="hidden" name='paciente_id' value="{{ $row->id }}">
                <input type="hidden" name="medico_id" value="{{$medico->id}}">
                <div class="grid gap-1">
                    <span class="font-semibold">Número de dias</span>
                    <input type="number" name="numDias" required class="dark:bg-slate-800 relative w-full cursor-default rounded-md bg-white py-1.5 pl-3 pr-10 text-left shadow-sm ring-1 ring-inset ring-gray-300 focus:outline-none focus:ring-2 sm:text-sm sm:leading-6">
                    <x-input-error class="mt-2" :messages="$errors->get('numDias')" />
                </div>
                <br>
                <div class="grid gap-1">
                    <span class="font-semibold mb-2">Observação</span>
                    {{--<input type="text" name="observacao" class="dark:bg-slate-800 relative w-full cursor-default rounded-md bg-white py-1.5 pl-3 pr-10 text-left shadow-sm ring-1 ring-inset ring-gray-300 focus:outline-none focus:ring-2 sm:text-sm sm:leading-6" value="Escreva">
                    <x-input-error class="mt-2" :messages="$errors->get('observacao')" />--}}
                </div>
            </div>
        </div>
    @livewire('busca-nome-remedio', ['medico' => $medico, 'row' => $row])
</div>