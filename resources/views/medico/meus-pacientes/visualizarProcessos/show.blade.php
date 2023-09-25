<div>
    Processos:

    {{ $medico->id }}
    {{ $paciente->id }}

    <table>
        <th>Processos</th>
        <tr>
            <td>id</td>
            <td>Dias restantes</td>
            <td>Status</td>
            <td>Visualizar respostas</td>
        </tr>
        @forelse ($forms as $formDiarios)
            @php
                if($checklist->where('forms_id', $formDiarios->id)->last() != null)
                {
                    $ultimo = $checklist->where('forms_id', $formDiarios->id)->last();
                    $ultimo = $ultimo->numDia;
                } else {
                    $ultimo = 0;
                }
                
                $qntDias = $formDiarios->numDias - $ultimo;
                $status = $formDiarios->status;
            @endphp
            <tr>
                <td> {{ $formDiarios->id }} </td>
                <td> {{ $qntDias }} de {{ $formDiarios->numDias}} </td>
                
                <td> {{ $status}} </td>
                <td>
                    Respostas <a href="{{ route('areamedico.acessoProcessosForms', ['idPac' => $formDiarios->paciente_id, 'idForm' => $formDiarios->id ]) }}">Clique aqui!</a>
                </td>
                @empty
                    <tr>
                        <td colspan="4">Sem processos</td>
                    </tr>
                @endforelse
            </tr>

        
    </table>

</div>