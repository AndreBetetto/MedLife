<div>
    {{-- The whole world belongs to you. --}}
    <div>
        <div>
            Gostaria de uma recomendation?
            @livewire('recomenda-medico', ['paciente' => $paciente])
        </div>
        


        <table>
            <th>Medicos cadastrados:</th>
            <tr>
                <td>id</td>
                <td>nome</td>
               
                <td>especialidade</td>
                <td>crm</td>    
                <ul role="list" class="divide-y divide-gray-100">
                 <li class="flex justify-between gap-x-6 py-5">
                <div class="flex min-w-0 gap-x-4">            
            </tr>
            @forelse ($medicos as $medico)
                @php
                    $medicoId = $medico->id;
                    $isSelected = $jaSelecionados->contains('medico_id', $medicoId);
                @endphp
                <div>
                <img class="h-12 w-12 flex-none rounded-full bg-gray-50" src="imagemacharr.png" alt="">
                
                <div class="min-w-0 flex-auto">
                <p class="text-sm font-semibold leading-6 text-gray-900"> {{ $medico->nome }} </p>
                 <p class="mt-1 truncate text-xs leading-5 text-gray-500">> {{ $medico->especialidade }} </p>
                </div>

                <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                 <p class="text-sm leading-6 text-gray-900"> {{ $medico->crm }} </p>
                 <p> {{ $medico->id }} </p>

                 @if (!$isSelected)
                    <p class="mt-1 text-xs leading-5 text-gray-500">
                        <form action="{{ route('areapaciente.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="medico_id" value="{{ $medicoId }}">
                            <input type="hidden" name="paciente_id" value="{{ $paciente->id }}">
                            <a href="{{ route('areapaciente.buscar') }}" class="rounded-md bg-purple-300 px-3.5 py-2.5 text-sm font-semibold text-gray-900 shadow-sm hover:bg-blue-100 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue">Adicionar</a>
                           
                        </form> 
</p>
</div>
                   
                    @elseif ($isSelected)
                        <td> 
                            ja selecionado
                        </td>
                        @endif
                </div>
</li>
</div>
                @if (!$isSelected)
                    <td>
                        <form action="{{ route('areapaciente.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="medico_id" value="{{ $medicoId }}">
                            <input type="hidden" name="paciente_id" value="{{ $paciente->id }}">
                            <a href="{{ route('areapaciente.buscar') }}" class="rounded-md bg-purple-300 px-3.5 py-2.5 text-sm font-semibold text-gray-900 shadow-sm hover:bg-blue-100 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue">Adicionar</a>
                           
                        </form> 
                    </td>
                    </tr>
                    @elseif ($isSelected)
                        <td> 
                            ja selecionado
                        </td>
                        @endif
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6">No doctors available</td>
                        </tr>
                    @endforelse
        </table>
              
    </div>
</div>
</div>