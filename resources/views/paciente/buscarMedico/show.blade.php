<div>
    {{-- The whole world belongs to you. --}}
    <div>
        <table>
            <th>Medicos cadastrados:</th>
            <tr>
                <td>id</td>
                <td>nome</td>
                <td>sobrenome</td>
                <td>especialidade</td>
                <td>crm</td>                
            </tr>
            @forelse ($medicos as $medicos)
            <tr>
                <td>{{ $medicos->id }}</td>
                <td>{{ $medicos->nome }}</td>
                <td>{{ $medicos->sobrenome }}</td>
                <td>{{ $medicos->especialidade }}</td>
                <td>{{ $medicos->crm }}</td>
                <td><a href="{{ route('areapaciente.buscar', $medicos->id) }}">Agendar</a></td>
            </tr>
                
            @empty
                <tr>
                    <td colspan="6">Nenhum medico cadastrado</td>
                </tr>
            @endforelse  
        </table>
              
    </div>
</div>
