<x-form-modal>
    <div>
        <div class="row"> 
            <!--fazer form funcionar-->
            <form action="{{ route('crudPaciente.store') }}" method="POST" enctype="multipart/form-data" class="col s12">
                @csrf
                <div class="row">
                    <div class="input-field col s6">
                        <label for="nome">Nome</label>
                        <input id="nome" name="nome" type="text" class="mt-1 block w-full" required autofocus />
                        <x-input-error class="mt-2" :messages="$errors->get('nome')" />
                    </div>

                    <div class="input-field col s6">
                        <label for="sobrenome">Sobrenome</label>
                        <input id="sobrenome" name="sobrenome" type="text" class="mt-1 block w-full" required autofocus />
                        <x-input-error class="mt-2" :messages="$errors->get('sobrenome')" />
                    </div>

                    <div class="input-field col s6">
                        <label for="dataNasc">Data de Nascimento</label>
                        <input id="dataNasc" name="dataNasc" type="date" class="mt-1 block w-full" required autofocus />
                        <x-input-error class="mt-2" :messages="$errors->get('dataNasc')" />
                    </div>     
                    
                    <div class="input-field col s6">
                        <label for="fone">Telefone</label>
                        <input x-mask="(14) 99999-9999" id="fone" name="fone" type="text" class="mt-1 block w-full" required autofocus />
                        <x-input-error class="mt-2" :messages="$errors->get('fone')" />
                    </div>
                    
                    <div class="input-field col s6">
                        <div class="mt-2 -mx-1">
                            <label for="sexo">Sexo</label>
                            <select name="sexo" id="sexo" class="dark:bg-slate-800 relative w-full cursor-default rounded-md bg-white py-1.5 pl-3 pr-10 text-left shadow-sm ring-1 ring-inset ring-gray-300 focus:outline-none focus:ring-2 sm:text-sm sm:leading-6">
                                <option value="Fem">Feminino</option>
                                <option value="Masc">Masculino</option>
                            </select>
                        </div>
                        <x-input-error class="mt-2" :messages="$errors->get('sexo')" />
                    </div>

                    <div class="input-field col s6">
                        <div class="mt-2 -mx-1">
                            <label for="estadoCivil">Estado Civil</label>
                            <select name="estadoCivil" id="estadoCivil" class="dark:bg-slate-800 relative w-full cursor-default rounded-md bg-white py-1.5 pl-3 pr-10 text-left shadow-sm ring-1 ring-inset ring-gray-300 focus:outline-none focus:ring-2 sm:text-sm sm:leading-6">
                                <option value="Solteiro">Solteiro(a)</option>
                                <option value="Casado">Casado(a)</option>
                                <option value="Separado">Separado(a)</option>
                                <option value="Divorciado">Divorciado(a)</option>
                                <option value="Viuvo">Viúvo(a)</option>
                            </select>
                        </div>
                        <x-input-error class="mt-2" :messages="$errors->get('estadoCivil')" />
                    </div>

                    <div class="input-field col s6">
                        <label for="rg">RG</label>
                        <input x-mask="99.999.999-9" id="rg" name="rg" type="text" class="mt-1 block w-full" required autofocus />
                        <x-input-error class="mt-2" :messages="$errors->get('rg')" />
                    </div>

                    <div class="input-field col s6">
                        <label for="cpf">CPF</label>
                        <input x-mask="999.999.999-99" id="cpf" name="cpf" type="text" class="mt-1 block w-full" required autofocus />
                        <x-input-error class="mt-2" :messages="$errors->get('cpf')" />
                    </div>

                    <div class="input-field col s6">
                        <label for="profissao">Profissão</label>
                        <input id="profissao" name="profissao" type="text" class="mt-1 block w-full" required autofocus />
                        <x-input-error class="mt-2" :messages="$errors->get('profissao')" />
                    </div>

                    <!-- arrumar os campos de primeira e ultima consulta de acordo com os nomes do banco -->
                    <div class="input-field col s6">
                        <label for="primCons">Primeira Consulta</label>
                        <input id="primCons" name="primCons" type="date" class="mt-1 block w-full" required autofocus />
                        <x-input-error class="mt-2" :messages="$errors->get('primCons')" />
                    </div>    

                    <div class="input-field col s6">
                        <label for="ultCons">Última Consulta</label>
                        <input id="ultCons" name="ultCons" type="date" class="mt-1 block w-full" required autofocus />
                        <x-input-error class="mt-2" :messages="$errors->get('ultCons')" />
                    </div>    

                    <div class="input-field col s6">
                        <label for="user_id">ID</label>
                        <select id="user_id" name="user_id" class="dark:bg-slate-800 relative w-full cursor-default rounded-md bg-white py-1.5 pl-3 pr-10 text-left shadow-sm ring-1 ring-inset ring-gray-300 focus:outline-none focus:ring-2 sm:text-sm sm:leading-6">
                            <option value="" disabled selected>Select a user</option>
                            @foreach($userList as $userl)
                                @if($userl->role == 'user')
                                    <option value="{{ $userl->id }}">(ID: {{ $userl->id }}) - {{ $userl->name }}</option>
                                @endif
                            @endforeach
                        </select>
                        <x-input-error class="mt-2" :messages="$errors->get('user_id')" />
                    </div>

                    <div class="input-field col s6">
                        <x-primary-button type="submit">{{ __('Enviar') }}</x-primary-button>
                        <x-primary-button type="reset">{{ __('Limpar') }}</x-primary-button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-form-modal>