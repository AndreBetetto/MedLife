<div>
    {{-- The whole world belongs to you. --}}
    <table>
        <th>Pacientes que tenho contato</th>
        <tr>
            <td>Nome</td>
            <td>Sobrenome</td>
            <td>Detalhes</td>       
        </tr>
        @forelse ($pacientes as $paciente)
            @php
                $pacienteId = $paciente->id;
                $isSelected = $pacMeds->contains('medico_id', $pacienteId);
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
            </tr>
                @endif
                @empty
                    <tr>
                        <td colspan="3">Sem pacientes adicionados</td>
                    </tr>
                @endforelse
    </table>
</div>