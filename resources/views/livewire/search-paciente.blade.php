<div>
<div>
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 dark:text-gray-200 font-bold">
            <div wire:poll.visible>
                <div wire:poll.keep-alive>
                    Current time: {{ now() }}
                </div>

                @if (session()->has('message'))
                <div>
                    {{ session('message') }}
                </div>
                @endif

                <div class="">                    
                    <x-input-label :value="__('Pesquisar')" />
                    <x-text-input name="search" type="text" class="mt-1 block w-80 text-gray-500" wire:model="search" />
                    <x-input-error class="mt-2" :messages="$errors->get('search')" />

                    <ul>
                        @foreach($results as $result)
                            <li>{{ $result->name }}</li>
                        @endforeach
                    </ul>
                </div>
                
                <x-form-modal>
               
                    <div>
                        <div class="row"> 
                            <!--fazer form funcionar-->
                            <form action="" method="POST" enctype="multipart/form-data" class="col s12">
                                @csrf

                                <div class="row">
                                    <div class="input-field col s6">
                                        <input id="nome" name="nome" type="text" class="mt-1 block w-full" required autofocus />
                                        <label for="nome">Nome</label>
                                        <x-input-error class="mt-2" :messages="$errors->get('nome')" />
                                    </div>

                                    <div class="input-field col s6">
                                        <input id="sobrenome" name="sobrenome" type="text" class="mt-1 block w-full" required autofocus />
                                        <label for="sobrenome">Sobrenome</label>
                                        <x-input-error class="mt-2" :messages="$errors->get('sobrenome')" />
                                    </div>

                                    <div class="input-field col s6">
                                        <input id="dataNasc" name="dataNasc" type="date" class="mt-1 block w-full" required autofocus />
                                        <label for="dataNasc">Data de Nascimento</label>
                                        <x-input-error class="mt-2" :messages="$errors->get('dataNasc')" />
                                    </div>     
                                    
                                    <div class="input-field col s6">
                                        <input x-mask="(14) 99999-9999" id="fone" name="fone" type="text" class="mt-1 block w-full" required autofocus />
                                        <label for="fone">Telefone</label>
                                        <x-input-error class="mt-2" :messages="$errors->get('fone')" />
                                    </div>
                                    
                                    <div class="input-field col s6">
                                        <div class="mt-2 -mx-1">
                                            <label for="sexo">Sexo</label>
                                            <button type="button" id="sexo" name="sexo" required autofocus class="relative w-full cursor-default rounded-md bg-white -mx-1 py-1.5 pl-3 pr-10 text-left text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:outline-none focus:ring-2 sm:text-sm sm:leading-6" aria-haspopup="listbox" aria-expanded="true" aria-labelledby="listbox-label">
                                                <span class="flex items-center">
                                                    <span class="ml-1 block truncate text-gray-500">Escolha uma opção</span>
                                                </span>
                                                <span class="pointer-events-none absolute inset-y-0 right-0 ml-3 flex items-center pr-2">
                                                    <svg class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                        <path fill-rule="evenodd" d="M10 3a.75.75 0 01.55.24l3.25 3.5a.75.75 0 11-1.1 1.02L10 4.852 7.3 7.76a.75.75 0 01-1.1-1.02l3.25-3.5A.75.75 0 0110 3zm-3.76 9.2a.75.75 0 011.06.04l2.7 2.908 2.7-2.908a.75.75 0 111.1 1.02l-3.25 3.5a.75.75 0 01-1.1 0l-3.25-3.5a.75.75 0 01.04-1.06z" clip-rule="evenodd" />
                                                    </svg>
                                                </span>
                                            </button>
                                            <ul class="absolute z-10 mt-1 max-h-56 w-full overflow-auto rounded-md bg-white py-1 text-base shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none sm:text-sm" tabindex="-1" role="listbox" aria-labelledby="listbox-label" aria-activedescendant="listbox-option-3">
                                                <li class="text-gray-900 relative cursor-default select-none py-2 pl-3 pr-9" id="listbox-option-0" role="option">
                                                    <div class="flex items-center">
                                                        <span class="font-normal ml-3 block truncate">Feminino</span>
                                                    </div>
                                                </li>
                                                <hr class="text-gray-700">
                                                <li class="text-gray-900 relative cursor-default select-none py-2 pl-3 pr-9" id="listbox-option-0" role="option">
                                                    <div class="flex items-center">
                                                        <span class="font-normal ml-3 block truncate">Masculino</span>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <x-input-error class="mt-2" :messages="$errors->get('sexo')" />
                                    </div>

                                    <div class="input-field col s6">
                                        <div class="mt-2 -mx-1">
                                            <label for="estadoCivil">Estado Civil</label>
                                            <button type="button" id="estadoCivil" name="estadoCivil" required autofocus class="relative w-full cursor-default rounded-md bg-white py-1.5 pl-3 pr-10 text-left text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:outline-none focus:ring-2 sm:text-sm sm:leading-6" aria-haspopup="listbox" aria-expanded="true" aria-labelledby="listbox-label">
                                                <span class="flex items-center">
                                                    <span class="ml-1 block truncate text-gray-500">Escolha uma opção</span>
                                                </span>

                                                <span class="pointer-events-none absolute inset-y-0 right-0 ml-3 flex items-center pr-2">
                                                    <svg class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                        <path fill-rule="evenodd" d="M10 3a.75.75 0 01.55.24l3.25 3.5a.75.75 0 11-1.1 1.02L10 4.852 7.3 7.76a.75.75 0 01-1.1-1.02l3.25-3.5A.75.75 0 0110 3zm-3.76 9.2a.75.75 0 011.06.04l2.7 2.908 2.7-2.908a.75.75 0 111.1 1.02l-3.25 3.5a.75.75 0 01-1.1 0l-3.25-3.5a.75.75 0 01.04-1.06z" clip-rule="evenodd" />
                                                    </svg>
                                                </span>
                                            </button>
                                            <ul class="absolute z-10 mt-1 max-h-56 w-full overflow-auto rounded-md bg-white py-1 text-base shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none sm:text-sm" tabindex="-1" role="listbox" aria-labelledby="listbox-label" aria-activedescendant="listbox-option-3">
                                                <li class="text-gray-900 relative cursor-default select-none py-2 pl-3 pr-9" id="listbox-option-0" role="option">
                                                    <div class="flex items-center">
                                                        <span class="font-normal ml-3 block truncate">Solteiro(a)</span>
                                                    </div>
                                                </li>
                                                <hr class="text-gray-700">
                                                <li class="text-gray-900 relative cursor-default select-none py-2 pl-3 pr-9" id="listbox-option-0" role="option">
                                                    <div class="flex items-center">
                                                        <span class="font-normal ml-3 block truncate">Casado(a)</span>
                                                    </div>
                                                </li>
                                                <hr class="text-gray-700">
                                                <li class="text-gray-900 relative cursor-default select-none py-2 pl-3 pr-9" id="listbox-option-0" role="option">
                                                    <div class="flex items-center">
                                                        <span class="font-normal ml-3 block truncate">Divorciado(a)</span>
                                                    </div>
                                                </li>
                                                <hr class="text-gray-700">
                                                <li class="text-gray-900 relative cursor-default select-none py-2 pl-3 pr-9" id="listbox-option-0" role="option">
                                                    <div class="flex items-center">
                                                        <span class="font-normal ml-3 block truncate">Separado(a)</span>
                                                    </div>
                                                </li>
                                                <hr class="text-gray-700">
                                                <li class="text-gray-900 relative cursor-default select-none py-2 pl-3 pr-9" id="listbox-option-0" role="option">
                                                    <div class="flex items-center">
                                                        <span class="font-normal ml-3 block truncate">Viúvo(a)</span>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <x-input-error class="mt-2" :messages="$errors->get('estadoCivil')" />
                                    </div>

                                    <div class="input-field col s6">
                                        <input x-mask="99.999.999-9" id="rg" name="rg" type="text" class="mt-1 block w-full" required autofocus />
                                        <label for="rg">RG</label>
                                        <x-input-error class="mt-2" :messages="$errors->get('rg')" />
                                    </div>

                                    <div class="input-field col s6">
                                        <input x-mask="999.999.999-99" id="cpf" name="cpf" type="text" class="mt-1 block w-full" required autofocus />
                                        <label for="cpf">CPF</label>
                                        <x-input-error class="mt-2" :messages="$errors->get('cpf')" />
                                    </div>

                                    <div class="input-field col s6">
                                        <input id="profissao" name="profissao" type="text" class="mt-1 block w-full" required autofocus />
                                        <label for="profissao">Profissão</label>
                                        <x-input-error class="mt-2" :messages="$errors->get('profissao')" />
                                    </div>

                                    <!-- arrumar os campos de primeira e ultima consulta de acordo com os nomes do banco -->
                                    <div class="input-field col s6">
                                        <input id="primCons" name="primCons" type="date" class="mt-1 block w-full" required autofocus />
                                        <label for="primCons">Primeira Consulta</label>
                                        <x-input-error class="mt-2" :messages="$errors->get('primCons')" />
                                    </div>    

                                    <div class="input-field col s6">
                                        <input id="ultCons" name="ultCons" type="date" class="mt-1 block w-full" required autofocus />
                                        <label for="ultCons">Última Consulta</label>
                                        <x-input-error class="mt-2" :messages="$errors->get('ultCons')" />
                                    </div>    

                                    <div class="input-field col s6">
                                        <input id="user_id" name="user_id" type="text" class="mt-1 block w-full" required autofocus />
                                        <label for="user_id">ID</label>
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

                <div> {{-- Div paciente --}}
                    <span class="text-gray-500"> Pacientes </span>
                    <div class="-mt-2 mb-3">
                        <div class="not-prose relative mt-5 rounded-xl overflow-hidden dark:bg-slate-800/25">
                            <div class="relative  py-3">
                                <div class="shadow-sm rounded-t-xl bg-purple-300  overflow-hidden my-1">
                                    <div class="grid grid-cols-8 border-collapse w-full">
                                        <span class="font-medium ml-4 text-slate-700 dark:text-slate-700 text-left my-5">ID</span>
                                        <span class="font-medium text-slate-700 dark:text-slate-700 text-left my-5">Imagem</span>
                                        <span class="font-medium text-slate-700 dark:text-slate-700 text-left my-5">Nome</span>
                                        <span class="font-medium text-slate-700 dark:text-slate-700 text-left my-5">CPF</span>
                                        <span class="font-medium text-slate-700 dark:text-slate-700 text-left my-5">Nascimento</span>
                                        <span class="font-medium text-slate-700 dark:text-slate-700 text-left my-5">Telefone</span>
                                        <span class="font-medium text-slate-700 dark:text-slate-700 text-left my-5">Sexo</span>
                                        <span class="font-medium text-slate-700 dark:text-slate-700 text-left my-5">Opções</span>
                                    </div>
                                </div>
                                @forelse ($pacientes as $pacientes)
                                    <div class="grid grid-cols-8 bg-white dark:bg-slate-800">
                                        <span class="text-sm border-b border-l border-slate-100 dark:border-slate-700 p-4 pl-3 py-10 text-slate-500 dark:text-slate-400 my-1/2">{{ $pacientes->id }}</span>
                                        <span class="text-sm border-b border-slate-100 dark:border-slate-700 p-4 pl-3 text-slate-500 dark:text-slate-400 my-1/2"><img class="rounded-full" src="teste_64.png"/></span>
                                        <span class="text-sm border-b border-slate-100 dark:border-slate-700 p-4 pl-3 py-10 text-slate-500 dark:text-slate-400">{{ $pacientes->nome }}</span>
                                        <span class="text-sm border-b border-slate-100 dark:border-slate-700 p-4 pl-3 py-10 text-slate-500 dark:text-slate-400">{{ $pacientes->cpf }}</span>
                                        <span class="text-sm border-b border-slate-100 dark:border-slate-700 p-4 pl-3 py-10 text-slate-500 dark:text-slate-400">{{ $pacientes->dataNasc }}</span>
                                        <span class="text-sm border-b border-slate-100 dark:border-slate-700 p-4 pl-3 py-10 text-slate-500 dark:text-slate-400">{{ $pacientes->fone }}</span>
                                        <span class="text-sm border-b border-slate-100 dark:border-slate-700 p-4 pl-3 py-10 text-slate-500 dark:text-slate-400">{{ $pacientes->sexo }}</span>
                                        <div class="text-sm border-b border-r border-slate-100 dark:border-slate-700 p-4 pl-3 py-10 text-slate-500 dark:text-slate-400"> 
                                            <button class="hover:text-gray-950 -my-3" wire:click="edit({{ $pacientes->id }})"> Editar </button>
                                            <button class="hover:text-gray-950" wire:click="delete({{ $pacientes->id }})"> Deletar </button>
                                        </div>
                                    </div>
                                @empty
                                    <div>
                                        <img src="semresultado.png">
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Get the button element and the list of options
    const button = document.querySelector('#sexo');
    const optionsList = document.querySelectorAll('ul[role="listbox"]');

    // Add event listener to the button to toggle the options list
    button.addEventListener('click', () => {
    optionsList.forEach(list => {
        list.classList.toggle('hidden'); // Toggle the visibility of the options list
    });

    const expanded = button.getAttribute('aria-expanded');
        button.setAttribute('aria-expanded', expanded === 'true' ? 'false' : 'true'); // Toggle the aria-expanded attribute
    });

    // Add event listeners to options for handling selections
    optionsList.forEach(list => {
        const options = list.querySelectorAll('li[role="option"]');
        options.forEach(option => {
            option.addEventListener('click', () => {
                const text = option.querySelector('.block.truncate').textContent;
                button.querySelector('.block.truncate').textContent = text;

                optionsList.forEach(list => {
                    list.classList.add('hidden'); // Hide the options list
                });

                button.setAttribute('aria-expanded', 'false'); // Set aria-expanded to false
            });
        });
    });

    // Close the options list when clicking outside of it
    document.addEventListener('click', event => {
        if (!button.contains(event.target)) {
            optionsList.forEach(list => {
                list.classList.add('hidden'); // Hide the options list
            });

            button.setAttribute('aria-expanded', 'false'); // Set aria-expanded to false
        }
    });
</script>

</div>
