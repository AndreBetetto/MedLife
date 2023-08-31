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
        </tr>
        @forelse ($formDiarios as $formDiarios)
            @php
                $pacienteId = $pacMeds->paciente_id;
                $qntForms = $formDiarios->where('medico_id', $medico->id)
                                    ->where('paciente_id', $pacienteId)
                                    ->count();
            @endphp
            <tr>
                <td> {{ $formDiarios->id }} </td>
                <td> {{ $formDiarios->sobrenome }} </td>
                
                @empty
                    <tr>
                        <td colspan="4">Sem pacientes adicionados</td>
                    </tr>
                @endforelse
            </tr>
        
    </table>

</div>