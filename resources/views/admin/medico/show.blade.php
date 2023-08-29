<div>
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 dark:text-gray-200 font-bold">
            <div wire:poll.visible>
                <div wire:poll.keep-alive>
                    Current time: {{ now() }}
                </div>
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
                <x-form-modal>
                    <div>
                        <div class="row">
                            <form action="{{ route('adminmedico.store') }}" method="POST" enctype="multipart/form-data" class="col s12">
                                @csrf

                                <div class="row">
                                    <div class="input-field col s6">
                                        <input placeholder=" " id="nome" name="nome" type="text" class="mt-1 block w-full"  required autofocus />
                                        <label for="nome">Nome</label>
                                        <input-error class="mt-2" :messages="$errors->get('nome')" />
                                    </div>

                                    <div class="input-field col s6">
                                        <input placeholder=" " id="sobrenome" name="sobrenome" type="text" class="mt-1 block w-full" required autofocus />
                                        <label for="sobrenome">Sobrenome</label>
                                        <input-error class="mt-2" :messages="$errors->get('sobrenome')" />
                                    </div>

                                    <div class="input-field col s6">
                                        <input placeholder=" " id="dataNasc" name="dataNasc" type="date" class="mt-1 block w-full" required autofocus />
                                        <label for="dataNasc">Data de Nascimento</label>
                                        <input-error class="mt-2" :messages="$errors->get('dataNasc')" />
                                    </div>

                                    <div class="input-field col s6">
                                        <input placeholder=" " id="sexo" name="sexo" type="text" class="mt-1 block w-full" required autofocus />
                                        <label for="sexo">Sexo</label>
                                            <div class="relative mt-2">
                                                <button type="button" class="relative w-full cursor-default rounded-md bg-white py-1.5 pl-3 pr-10 text-left text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 sm:text-sm sm:leading-6" aria-haspopup="listbox" aria-expanded="true" aria-labelledby="listbox-label">
                                                    <span class="flex items-center">
                                                        <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="" class="h-5 w-5 flex-shrink-0 rounded-full">
                                                        <span class="ml-3 block truncate">Tom Cook</span>
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
                                                        <img src="https://images.unsplash.com/photo-1491528323818-fdd1faba62cc?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="" class="h-5 w-5 flex-shrink-0 rounded-full">
                                                        <!-- Selected: "font-semibold", Not Selected: "font-normal" -->
                                                        <span class="font-normal ml-3 block truncate">Wade Cooper</span>
                                                        </div>

                                                        <!--
                                                        Checkmark, only display for selected option.

                                                        Highlighted: "text-white", Not Highlighted: "text-indigo-600"
                                                        -->
                                                        <span class="text-indigo-600 absolute inset-y-0 right-0 flex items-center pr-4">
                                                        <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                            <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
                                                        </svg>
                                                        </span>
                                                    </li>
                                                </ul>
                                            </div>
                                        <input-error class="mt-2" :messages="$errors->get('sexo')" />
                                    </div>

                                    <script>
                                        // Opcional: Você pode adicionar um event listener para ouvir as mudanças no select
                                        const selectElement = document.getElementById('sexo');

                                        selectElement.addEventListener('change', (event) => {
                                        const selectedValue = event.target.value;
                                        console.log(`Opção selecionada: ${selectedValue}`);
                                        });
                                    </script>

                                    <div class="input-field col s6">
                                        <input placeholder=" " id="rg" name="rg" type="text" class="mt-1 block w-full" required autofocus />
                                        <label for="rg">RG</label>
                                        <input-error class="mt-2" :messages="$errors->get('rg')" />
                                    </div>

                                    <div class="input-field col s6">
                                        <input placeholder=" " id="cpf" name="cpf" type="text" class="mt-1 block w-full" required autofocus />
                                        <label for="cpf">CPF</label>
                                        <input-error class="mt-2" :messages="$errors->get('cpf')" />
                                    </div>

                                    <div class="input-field col s6">
                                        <input placeholder=" " id="fone" name="fone" type="text" class="mt-1 block w-full" required autofocus />
                                        <label for="fone">Telefone</label>
                                        <input-error class="mt-2" :messages="$errors->get('fone')" />
                                    </div>

                                    <div class="input-field col s6">
                                        <input placeholder=" " id="estadoCivil" name="estadoCivil" type="text" class="mt-1 block w-full" required autofocus />
                                        <label for="estadoCivil">Estado Civil</label>
                                        <input-error class="mt-2" :messages="$errors->get('estadoCivil')" />
                                    </div>

                                    <div class="input-field col s6">
                                        <input placeholder=" " id="especialidade" name="especialidade" type="text" class="mt-1 block w-full" required autofocus />
                                        <label for="especialidade">Especialidade</label>
                                        <input-error class="mt-2" :messages="$errors->get('especialidade')" />
                                    </div>

                                    <div class="input-field col s6">
                                        <input placeholder=" " id="crm" name="crm" type="text" class="mt-1 block w-full" required autofocus />
                                        <label for="crm">CRM</label>
                                        <input-error class="mt-2" :messages="$errors->get('crm')" />
                                    </div>

                                    <div class="input-field col s6">
                                        <input placeholder=" " id="user_id" name="user_id" type="text" class="mt-1 block w-full" required autofocus />
                                        <label for="user_id">ID</label>                                        
                                        <input-error class="mt-2" :messages="$errors->get('user_id')" />
                                    </div>
                                    
                                    <div class="flex items-center gap-4 mt-4">
                                        <x-primary-button type="submit">{{ __('Enviar') }}</x-primary-button>
                                        <x-primary-button type="reset">{{ __('Limpar') }}</x-primary-button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </x-form-modal>
                <span> Médicos</span>
                <div class="mt-4 mb-3">
                    <div class="not-prose relative bg-slate-50 rounded-xl overflow-hidden dark:bg-slate-800/25">
                        <div class="relative rounded-xl bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500">
                            <div class="shadow-sm overflow-hidden my-8">
                                <div class="grid grid-cols-small-table border-collapse w-full">
                                    <span class="font-medium p-4 pl-8 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">ID</span>
                                    <span class="font-medium p-4 pr-8 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">Sobrenome</span>
                                    <span class="font-medium p-4 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">Nome</span>
                                    <span class="font-medium p-4 pr-8 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">Telefone</span>
                                    <span class="font-medium p-4 pr-8 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">CRM</span>
                                    <span class="font-medium p-4 pr-8 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">Sexo</span>
                                    <span class="font-medium p-4 pr-8 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">Especialidade</span>
                                </div>
                            </div>
                            @forelse ($medicos as $medicos)
                                <div class="grid grid-cols-small-table bg-white dark:bg-slate-800">
                                    <span class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">{{ $medicos->id }}</span>
                                    <span class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">{{ Str::ucfirst($medicos->sobrenome); }}</span>
                                    <span class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">{{ Str::ucfirst($medicos->nome); }}</span>
                                    <span class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">{{ $medicos->crm }}</span>
                                    <span class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">{{ $medicos->sexo }}</span>
                                    <span class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">{{ $medicos->especialidade }}</span>
                                </div>
                            @empty
                                <div>
                                    <span>Sem registro</span>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>