<x-form-modal>
    <div>
        <div>
            <form action="{{ route('adminmedico.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="grid grid-cols-2">
                    <div class="flex flex-col bg-red-400">
                        <label>Nome:</label>
                        <label>Sobrenome:</label>
                        <label>Data de nascimento:</label>
                        <label>Sexo:</label>
                        <label>CPF:</label>
                        <label>RG:</label>
                        <label>Telefone:</label>
                        <label>Estado civil:</label>
                        <label>Especialidade:</label>
                        <label>CRM:</label>
                        <label>Id:</label>
                    </div>
                    <div class="flex flex-col">
                        <input type="text" id="nome" name="nome">
                        <input type="text" id="sobrenome" name="sobrenome">
                        <input type="date" id="dataNasc" name="dataNasc">
                        <input type="text" id="sexo" name="sexo">
                        <input type="number" id="cpf" name="cpf">
                        <input type="number" id="rg" name="rg">
                        <input type="number" id="fone" name="fone">
                        <input type="text" id=" estadoCivil" name="estadoCivil">
                        <input type="text" id="especialidade" name="especialidade">
                        <input type="number" id="crm" name="crm">
                        <input type="number" id="user_id" name="user_id">
                    </div>
                </div>
                
                <x-primary-button>{{ __('Submit') }}</x-primary-button>
                <x-primary-button>{{ __('Reset') }}</x-primary-button>
            </form>
        </div>
    </div>
</x-form-modal>
<table border="1" >
    <th> Médicos</th>
    <tr>
        <td>ID</td>
        <td>Nome</td>
        <td>Sobrenome</td>
        <td>Telefone</td>
        <td>CRM</td>
        <td>Sexo</td>
        <td>Especialidade</td>
    </tr>
    <tr>
        @forelse ($medicos as $medicos)
        <td>{{$medicos->id}}</td>
        <td>{{$medicos->nome}}</td>
        <td>{{$medicos->sobrenome}}</td>
        <td>{{$medicos->fone}}</td>
        <td>{{$medicos->crm}}</td>
        <td>{{$medicos->sexo}}</td>
        <td>{{$medicos->especialidade}}</td>
    </tr>
        @empty
        <tr>
            <td rowspan="7">Sem registro</td>
        </tr>
        @endforelse
</table>
