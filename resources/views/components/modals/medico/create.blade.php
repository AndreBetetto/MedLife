<x-form-modal>
    <form action="{{ route('crudMedico.store') }}" method="POST" enctype="multipart/form-data" class="grid grid-cols-2 gap-8">
        @csrf
        <div class="gap-8">
            <div class="">
                <label for="nome">Nome</label>
                <input id="nome" name="nome" type="text" class="dark:bg-slate-800 relative w-full cursor-default rounded-md bg-white py-1.5 pl-3 pr-10 text-left shadow-sm ring-1 ring-inset ring-gray-300 focus:outline-none focus:ring-2 sm:text-sm sm:leading-6" required autofocus />
                <x-input-error class="mt-2" :messages="$errors->get('nome')" />
            </div>

            <div class="">
                <label for="sobrenome">Sobrenome</label>
                <input id="sobrenome" name="sobrenome" type="text" class="dark:bg-slate-800 relative w-full cursor-default rounded-md bg-white py-1.5 pl-3 pr-10 text-left shadow-sm ring-1 ring-inset ring-gray-300 focus:outline-none focus:ring-2 sm:text-sm sm:leading-6" required autofocus />
                <x-input-error class="mt-2" :messages="$errors->get('sobrenome')" />
            </div>

            <div class="">
                <label for="dataNasc">Data de Nascimento</label>
                <input id="dataNasc" name="dataNasc" type="date" class="dark:bg-slate-800 relative w-full cursor-default rounded-md bg-white py-1.5 pl-3 pr-10 text-left shadow-sm ring-1 ring-inset ring-gray-300 focus:outline-none focus:ring-2 sm:text-sm sm:leading-6" required autofocus />
                <x-input-error class="mt-2" :messages="$errors->get('dataNasc')" />
            </div>                             
            
            <div class="mt-2 mx-3 flex flex-col">
                <label for="sexo">Sexo</label>
                    <select name="sexo" id="sexo" class="dark:bg-slate-800 relative w-full cursor-default rounded-md bg-white py-1.5 pl-3 pr-10 text-left shadow-sm ring-1 ring-inset ring-gray-300 focus:outline-none focus:ring-2 sm:text-sm sm:leading-6">
                        <option value="Fem">Feminino</option>
                        <option value="Masc">Masculino</option>
                    </select>
                <x-input-error class="mt-2" :messages="$errors->get('sexo')" />
            </div>

            <div class="">
                <label for="rg">RG</label>
                <input x-mask="99.999.999-9" id="rg" name="rg" type="text" class="dark:bg-slate-800 relative w-full cursor-default rounded-md bg-white py-1.5 pl-3 pr-10 text-left shadow-sm ring-1 ring-inset ring-gray-300 focus:outline-none focus:ring-2 sm:text-sm sm:leading-6" required autofocus />
                <x-input-error class="mt-2" :messages="$errors->get('rg')" />
            </div>

            <div class="">
                <label for="cpf">CPF</label>
                <input x-mask="999.999.999-99" id="cpf" name="cpf" type="text" class="dark:bg-slate-800 relative w-full cursor-default rounded-md bg-white py-1.5 pl-3 pr-10 text-left shadow-sm ring-1 ring-inset ring-gray-300 focus:outline-none focus:ring-2 sm:text-sm sm:leading-6" required autofocus />
                <x-input-error class="mt-2" :messages="$errors->get('cpf')" />
            </div>
        </div>

        <div class="gap-8">
            <div class="">
                <label for="fone">Telefone</label>
                <input x-mask="(14) 99999-9999" id="fone" name="fone" type="text" class="dark:bg-slate-800 relative w-full cursor-default rounded-md bg-white py-1.5 pl-3 pr-10 text-left shadow-sm ring-1 ring-inset ring-gray-300 focus:outline-none focus:ring-2 sm:text-sm sm:leading-6" required autofocus />
                <x-input-error class="mt-2" :messages="$errors->get('fone')" />
            </div>
            
            <div class="mt-2 mx-3 flex flex-col">
                <label for="estadoCivil">Estado Civil</label>
                    <select name="estadoCivil" id="estadoCivil" class="dark:bg-slate-800 relative w-full cursor-default rounded-md bg-white py-1.5 pl-3 pr-10 text-left shadow-sm ring-1 ring-inset ring-gray-300 focus:outline-none focus:ring-2 sm:text-sm sm:leading-6">
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
                <select id="especialidade" name="especialidade" class="dark:bg-slate-800 relative w-full cursor-default rounded-md bg-white py-1.5 pl-3 pr-10 text-left shadow-sm ring-1 ring-inset ring-gray-300 focus:outline-none focus:ring-2 sm:text-sm sm:leading-6">
                    <option value="" disabled selected>Select a especialidade</option>
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
                <input x-mask="999999" id="crm" name="crm" type="text" class="dark:bg-slate-800 relative w-full cursor-default rounded-md bg-white py-1.5 pl-3 pr-10 text-left shadow-sm ring-1 ring-inset ring-gray-300 focus:outline-none focus:ring-2 sm:text-sm sm:leading-6" required autofocus />
                <x-input-error class="mt-2" :messages="$errors->get('crm')" />
            </div>

            <div>
                <label for="user_id">User</label>
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
</x-form-modal>