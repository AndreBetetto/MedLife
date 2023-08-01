<div>
    {{-- Do your work, then step back. --}}

    {{-- !!!!Colocar tudo que vai aparecer na tela inicial do ADM aqui!!!! --}}

    
    <div> {{-- Div usuario --}}
        <table>
            <th> Usuários </th>
            <tr>
                <td> ID </td>
                <td> Nome </td>
                <td> email </td>
                <td> tipo </td>
                <td> Criado em: </td>
                <td> atualizado em: </td>
            </tr>
            @foreach ($user as $user)
                    <tr>
                        <td> {{ $user->id }} </td>
                        <td> {{ $user->name }} </td>
                        <td> {{ $user->email }} </td>
                        <td> {{ $user->tipo }} </td>
                        <td> {{ $user->created_at }} </td>
                        <td> {{ $user->updated_at }} </td>
                    </tr>
            @endforeach
        </table>
    </div>

    <div> {{-- Div paciente --}}
        <table>
            <th> Pacientes </th>
            <tr>
                <td> ID </td>
                <td> Nome </td>
                <td> CPF </td>
                <td> Data de nascimento </td>
                <td> Telefone </td>
                <td> Sexo </td>
                <td> Opcoes </td>
            </tr>
            @foreach ($paciente as $paciente)
                    <tr>
                        <td> {{ $paciente->id }} </td>
                        <td> {{ $paciente->name }} </td>
                        <td> {{ $paciente->cpf }} </td>
                        <td> {{ $paciente->data_nasc }} </td>
                        <td> {{ $paciente->telefone }} </td>
                        <td> {{ $paciente->sexo }} </td>
                        <td> 
                            <button wire:click="edit({{ $paciente->id }})"> Editar </button>
                            <button wire:click="delete({{ $paciente->id }})"> Deletar </button>
                        </td>
                    </tr>
            @endforeach
        </table>
    </div>

</div>
