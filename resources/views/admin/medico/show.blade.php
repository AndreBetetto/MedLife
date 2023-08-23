<x-form-modal>
    <div>
        <div>
            <form action="{{ route('adminmedico.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div>
                    <x-input-label for="nome" :value="__('Nome')" />
                    <x-text-input id="nome" name="nome" type="text" class="mt-1 block w-full"  required autofocus />
                    <x-input-error class="mt-2" :messages="$errors->get('nome')" />
                </div>
                <div>
                    <x-input-label for="sobrenome" :value="__('Sobrenome')" />
                    <x-text-input id="sobrenome" name="sobrenome" type="text" class="mt-1 block w-full" required autofocus />
                    <x-input-error class="mt-2" :messages="$errors->get('sobrenome')" />
                </div>
                <div>
                    <x-input-label for="dataNasc" :value="__('Data de Nascimento')" />
                    <x-text-input id="dataNasc" name="dataNasc" type="text" class="mt-1 block w-full" required autofocus />
                    <x-input-error class="mt-2" :messages="$errors->get('dataNasc')" />
                </div>
                <div>
                    <x-input-label for="sexo" :value="__('Sexo')" />
                    <x-text-input id="sexo" name="sexo" type="text" class="mt-1 block w-full" required autofocus />
                    <x-input-error class="mt-2" :messages="$errors->get('sexo')" />
                </div>
                <div>
                    <x-input-label for="rg" :value="__('RG')" />
                    <x-text-input id="rg" name="rg" type="text" class="mt-1 block w-full" required autofocus />
                    <x-input-error class="mt-2" :messages="$errors->get('rg')" />
                </div>
                <div>
                    <x-input-label for="cpf" :value="__('CPF')" />
                    <x-text-input id="cpf" name="cpf" type="text" class="mt-1 block w-full" required autofocus />
                    <x-input-error class="mt-2" :messages="$errors->get('cpf')" />
                </div>
                <div>
                    <x-input-label for="fone" :value="__('Telefone')" />
                    <x-text-input id="fone" name="fone" type="text" class="mt-1 block w-full" required autofocus />
                    <x-input-error class="mt-2" :messages="$errors->get('fone')" />
                </div>
                <div>
                    <x-input-label for="estadoCivil" :value="__('Estado Civil')" />
                    <x-text-input id="estadoCivil" name="estadoCivil" type="text" class="mt-1 block w-full" required autofocus />
                    <x-input-error class="mt-2" :messages="$errors->get('estadoCivil')" />
                </div>
                <div>
                    <x-input-label for="especialidade" :value="__('Especialidade')" />
                    <x-text-input id="especialidade" name="especialidade" type="text" class="mt-1 block w-full" required autofocus />
                    <x-input-error class="mt-2" :messages="$errors->get('especialidade')" />
                </div>
                <div>
                    <x-input-label for="crm" :value="__('CRM')" />
                    <x-text-input id="crm" name="crm" type="text" class="mt-1 block w-full" required autofocus />
                    <x-input-error class="mt-2" :messages="$errors->get('crm')" />
                </div>
                <div>
                    <x-input-label for="user_id" :value="__('ID')" />
                    <x-text-input id="user_id" name="user_id" type="text" class="mt-1 block w-full" required autofocus />
                    <x-input-error class="mt-2" :messages="$errors->get('user_id')" />
                </div>
                
                <div class="flex items-center gap-4 mt-4">
                    <x-primary-button>{{ __('Submit') }}</x-primary-button>
                    <x-primary-button>{{ __('Reset') }}</x-primary-button>
                </div>
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
