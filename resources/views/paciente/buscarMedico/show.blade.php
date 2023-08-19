<div>
    {{-- The whole world belongs to you. --}}
    <div>
        <div>
            Gostaria de uma recomendation?
            <form action="{{ route('areapaciente.recomenda') }}" method="POST" enctype="multipart/form-data">
                @csrf
                Digite aqui seus sintomas:
                <input type="textbox" name="input">
                <button type="submit">Pegar recomendacao!</button>
            </form> 
            Recoemnda: {{ $specialty }}}
        </div>
        


        <table>
            <th>Medicos cadastrados:</th>
            <tr>
                <td>id</td>
                <td>nome</td>
                <td>sobrenome</td>
                <td>especialidade</td>
                <td>crm</td>                
            </tr>
            @forelse ($medicos as $medico)
                @php
                    $medicoId = $medico->id;
                    $isSelected = $jaSelecionados->contains('medico_id', $medicoId);
                @endphp
                <td> {{ $medico->id }} </td>
                <td> {{ $medico->nome }} </td>
                <td> {{ $medico->sobrenome }} </td>
                <td> {{ $medico->especialidade }} </td>
                <td> {{ $medico->crm }} </td>
                
                    
                @if (!$isSelected)
                    <td>
                        <form action="{{ route('areapaciente.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="medico_id" value="{{ $medicoId }}">
                            <input type="hidden" name="paciente_id" value="{{ $paciente->id }}">
                            <button type="submit">Adicionar</button>
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
