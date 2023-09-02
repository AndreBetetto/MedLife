<div>
    {{-- The whole world belongs to you. --}}
    <table>
        <th>Pacientes que tenho contato</th>
        <tr>
            <td>Nome</td>
            <td>Sobrenome</td>
            <td>Detalhes</td>  
            <td>Processos em andamento</td>     
        </tr>
        @forelse ($pacientes as $paciente)
            @php
                $pacienteId = $paciente->id;
                $isSelected = $pacMeds->contains('medico_id', $pacienteId);
                $qntForms = $formsDiario->where('medico_id', $medico->id)
                                    ->where('paciente_id', $pacienteId)
                                    ->count();
            @endphp
            @if (!$isSelected)
            <tr>
                <td> {{ $paciente->nome }} </td>
                <td> {{ $paciente->sobrenome }} </td>
                <td> 
                    <form action="{{ route('areamedico.meusPacientescriarForm', ['id' => $paciente->id]) }}" method="GET">
                        @csrf
                        <button type="submit">Criar formulario</button>
                    </form>
                </td>
                <td>
                    {{ $qntForms }}
                </td>
            </tr>
                @endif
                @empty
                    <tr>
                        <td colspan="4">Sem pacientes adicionados</td>
                    </tr>
                @endforelse
    </table>
</div>


<div class="bg-white">
    <div class="mx-auto max-w-2xl px-4 py-20 sm:px-6 sm:py-4 lg:max-w-7xl lg:px-8">
        <h2 class="flex items-center text-xl font-bold leading-tight text-gray-800 items-center mt-4 my-5">Pacientes</h2>

        <div class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
            @forelse ($pacientes as $paciente)
                @php
                    $pacienteId = $paciente->id;
                    $isSelected = $pacMeds->contains('medico_id', $pacienteId);
                    $qntForms = $formsDiario->where('medico_id', $medico->id)
                                        ->where('paciente_id', $pacienteId)
                                        ->count();
                @endphp

                <div>
                    <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-h-8 xl:aspect-w-7">
                        <img src="https://tailwindui.com/img/ecommerce-images/category-page-04-image-card-01.jpg" alt="Paciente" class="h-full w-full object-cover object-center group-hover:opacity-75">
                    </div>
                
                    <h3 class="mt-4 text-lg text-gray-700">
                        @if (!$isSelected)  
                            {{ $paciente->nome }} 
                            {{ $paciente->sobrenome }} 

                            <form action="{{ route('areamedico.meusPacientescriarForm', ['id' => $paciente->id]) }}" method="GET">
                                @csrf
                                <button type="submit" class="font-bold">Criar formulario</button>
                            </form>
                        @endif

                        @empty
                            <p>Sem pacientes adicionados</p>
                    </h3>
                </div>
            @endforelse
        </div>
    </div>
</div>