<div>
    {{-- The whole world belongs to you. --}}
    <table>
        <th>Medicos que tenho contato</th>
        <tr>
            <td>Nome</td>
            <td>Sobrenome</td>
            <td>especialidade</td>
            <td>Detalhes</td>      
        </tr>
        @forelse ($medicos as $medico)
            @php
                $medicoId = $medico->id;
                $isSelected = $pacMeds->contains('medico_id', $medicoId);
            @endphp
            @if ($isSelected)
            <tr>
                <td> {{ $medico->nome }} </td>
                <td> {{ $medico->sobrenome }} </td>
                <td> {{ $medico->especialidade }} </td>
                <td> 
                    DETALHES <a href="{{ route('areapaciente.medicoDetalhes', ['id' => $medicoId]) }}">Clique aqui!</a>
                </td>
            </tr>
                @endif
                @empty
                    <tr>
                        <td colspan="4">No doctors available</td>
                    </tr>
                @endforelse
    </table>
</div>
