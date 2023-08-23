<div>
    {{-- Do your work, then step back. --}}

    {{-- !!!!Colocar tudo que vai aparecer na tela inicial do ADM aqui!!!! --}}
    <div wire:poll.visible>
        <div wire:poll.keep-alive>
            Current time: {{ now() }}
        </div>
    </div>

    Links tela admin:
    <div>
        <a href="{{ route('crudUser.index') }}">Usuários</a>
        <a href="{{ route('crudPaciente.index') }}">Pacientes</a>
        <a href="{{ route('adminmedico.index') }}">Médicos</a>



    </div>

    @if (session()->has('message'))
        <div>
            {{ session('message') }}
        </div>
    @endif
    
    <div> {{-- Div usuario --}}
        <input type="search" wire:model="search" class="form-control float-end mx-2" placeholder="Search..." style="width: 230px" />
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
            @forelse ($users as $users)
                    <tr>
                        <td> {{ $users->id }} </td>
                        <td> {{ $users->name }} </td>
                        <td> {{ $users->email }} </td>
                        <td> {{ $users->tipo }} </td>
                        <td> {{ $users->created_at }} </td>
                        <td> {{ $users->updated_at }} </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">No Record Found</td>
                    </tr>
                @endforelse
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
            @forelse ($pacientes as $pacientes)
                    <tr>
                        <td> {{ $pacientes->id }} </td>
                        <td> {{ $pacientes->name }} </td>
                        <td> {{ $pacientes->cpf }} </td>
                        <td> {{ $pacientes->data_nasc }} </td>
                        <td> {{ $pacientes->telefone }} </td>
                        <td> {{ $pacientes->sexo }} </td>
                        <td> 
                            <button wire:click="edit({{ $pacientes->id }})"> Editar </button>
                            <button wire:click="delete({{ $pacientes->id }})"> Deletar </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">No Record Found</td>
                    </tr>
                @endforelse
        </table>
    </div>

</div>
