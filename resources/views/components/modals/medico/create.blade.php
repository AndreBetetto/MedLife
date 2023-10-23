<section>
    <button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'create-new-physician')"
        class="rounded bg-purple-500 flex items-center align-middle gap-3 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-purple-300 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]"
    >
        <i class="large material-icons">person_add</i>
        <span>Adicionar Médico</span>
    </button>

    <x-modal name="create-new-physician" focusable>
        <form action="{{ route('crudMedico.store') }}" method="POST" enctype="multipart/form-data" class="grid grid-cols-2 gap-8">
            @csrf

            <div class="gap-8">
                <div class="">
                    <label for="nome">Nome</label>
                    <x-text-input id="nome" name="nome" type="text" class="block mt-1 w-full" required autofocus />
                    <x-input-error class="mt-2" :messages="$errors->get('nome')" />
                </div>

                <div class="">
                    <label for="sobrenome">Sobrenome</label>
                    <x-text-input id="sobrenome" name="sobrenome" type="text" class="block mt-1 w-full" required autofocus />
                    <x-input-error class="mt-2" :messages="$errors->get('sobrenome')" />
                </div>

                <div class="">
                    <label for="dataNasc">Data de Nascimento</label>
                    <x-text-input id="dataNasc" name="dataNasc" type="date" class="block mt-1 w-full" required autofocus />
                    <x-input-error class="mt-2" :messages="$errors->get('dataNasc')" />
                </div>                             
                
                <div class="mt-2 mx-3 flex flex-col">
                    <label for="sexo">Sexo</label>
                        <select name="sexo" id="sexo" class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                            <option value="Fem">Feminino</option>
                            <option value="Masc">Masculino</option>
                        </select>
                    <x-input-error class="mt-2" :messages="$errors->get('sexo')" />
                </div>

                <div class="">
                    <label for="rg">RG</label>
                    <x-text-input x-mask="99.999.999-9" id="rg" name="rg" type="text" class="block mt-1 w-full" required autofocus />
                    <x-input-error class="mt-2" :messages="$errors->get('rg')" />
                </div>

                <div class="">
                    <label for="cpf">CPF</label>
                    <x-text-input x-mask="999.999.999-99" id="cpf" name="cpf" type="text" class="block mt-1 w-full" required autofocus />
                    <x-input-error class="mt-2" :messages="$errors->get('cpf')" />
                </div>
            </div>

            <div class="gap-8">
                <div class="">
                    <label for="fone">Telefone</label>
                    <x-text-input x-mask="(14) 99999-9999" id="fone" name="fone" type="text" class="block mt-1 w-full" required autofocus />
                    <x-input-error class="mt-2" :messages="$errors->get('fone')" />
                </div>
                
                <div class="mt-2 mx-3 flex flex-col">
                    <label for="estadoCivil">Estado Civil</label>
                        <select name="estadoCivil" id="estadoCivil" class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                            <option value="Solteiro">Solteiro(a)</option>
                            <option value="Casado">Casado(a)</option>
                            <option value="Separado">Separado(a)</option>
                            <option value="Divorciado">Divorciado(a)</option>
                            <option value="Viuvo">Viúvo(a)</option>
                        </select>
                    <x-input-error class="mt-2" :messages="$errors->get('estadoCivil')" />
                </div>


                <div class="">
                    <label for="especialidade">Especialidade</label>
                    <select id="especialidade" name="especialidade" class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                        <option value="" disabled selected>Selecione a especialidade</option>
                        @foreach($specializations as $specialization)
                            <option value="{{ $specialization['Name'] }}">{{ $specialization['Name'] }}</option>
                        @endforeach
                    </select>
                    <x-input-error class="mt-2" :messages="$errors->get('especialidade')" />

                    <!-- You can add x-input-error here if needed -->
                </div>

                <script>
                    // Initialize Select2 for the specialization dropdown
                    $(document).ready(function () {
                        $('#specialization').select2();
                    });
                </script>

                <div class="">
                    <label for="crm">CRM</label>
                    <x-text-input x-mask="999999" id="crm" name="crm" type="text" class="block mt-1 w-full" required autofocus />
                    <x-input-error class="mt-2" :messages="$errors->get('crm')" />
                </div>

                <div>
                    <label for="user_id">User</label>
                    <select id="user_id" name="user_id" class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                        <option value="" disabled selected>Selecione um usuário</option>
                        @foreach($userList as $userl)
                            @if($userl->role == 'user')
                                <option value="{{ $userl->id }}">(ID: {{ $userl->id }}) - {{ $userl->name }}</option>
                            @endif
                        @endforeach
                    </select>
                    <x-input-error class="mt-2" :messages="$errors->get('user_id')" />
                </div>
                
                <script>
                    // Initialize Select2
                    $(document).ready(function () {
                        $('#user_id').select2();
                    });
                </script>
            </div>

            <div class="">
                <x-primary-button type="submit">{{ __('Enviar') }}</x-primary-button>
                <x-primary-button type="reset">{{ __('Limpar') }}</x-primary-button>
            </div>
        </form>
    </x-modal>
</section>