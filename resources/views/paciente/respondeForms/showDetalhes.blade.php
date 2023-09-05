<div>
    Processos:

    {{ $medico->id }}
    {{ $paciente->id }}

    <table>
        @php
            $pacienteId = $paciente->id;
            $qntForms = $formDiarios->where('medico_id', $medico->id)
                                    ->where('paciente_id', $pacienteId)
                                    ->count();
            @endphp
        <th>Processos</th>
        <tr>
            <td>id</td>
            <td>Dias restantes</td>
            <td>Responder</td>
            <td>Status</td>
            <td>Visulaizar respostas</td>
        </tr>
        @forelse ($formDiarios as $formDiarios)
            @php
                $qntDias = $formDiarios->numDias;
                $status = $formDiarios->status;
            @endphp
            <tr>
                <td> {{ $formDiarios->id }} </td>
                <td> {{ $qntDias }} </td>
                @if ( $status == 'Em andamento' || $status == 'Aguardando' )
                    <td> <a href="{{ route('areapaciente.medicoDetalhesForms', ['id' => $formDiarios->id]) }}">Responder</a> </td>
                @else
                    <td>Nao disponivel</td>
                @endif
                <td> {{ $status}} </td>
                <td>
                    Suas respostas <a href="{{ route('areapaciente.acessoForms', ['id' => $formDiarios->id]) }}">Clique aqui!</a>
                </td>
                @empty
                    <tr>
                        <td colspan="4">Sem pacientes adicionados</td>
                    </tr>
                @endforelse
            </tr>

        
    </table>

</div>