<div>
    <div>
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-200 font-bold">
                <!-- <div wire:poll.visible> 
                    <div class="space-y-3">  
                        <div wire:poll.keep-alive>
                            Current time: {{ now() }}
                        </div>
                    </div>
                </div>
                    @if (session()->has('message'))
                        <div>
                            {{ session('message') }}
                        </div>
                    @endif -->

                <div>                  
                    <x-input-label :value="__('Pesquisar')" />
                    <x-text-input name="search" type="text" class="mt-1 block w-80 text-gray-500" wire:model="search" />
                    <x-input-error class="mt-2" :messages="$errors->get('search')" />
                </div>
                
                <x-form-modal>
                    <form action="{{ route('adminmedico.store') }}" method="POST" enctype="multipart/form-data" class="grid grid-cols-2 gap-8">
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
                                            <option value="Feminino">Feminino</option>
                                            <option value="Masculino">Masculino</option>
                                        </select>
                                        <!-- <button type="button" id="sexo" name="sexo" required autofocus class="dark:bg-slate-800 relative w-full cursor-default rounded-md bg-white py-1.5 pl-3 pr-10 text-left text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:outline-none focus:ring-2 sm:text-sm sm:leading-6" aria-haspopup="listbox" aria-expanded="true" aria-labelledby="listbox-label">
                                            <span class="flex items-center">
                                                <span class="ml-1 block truncate text-gray-500">Escolha uma opção</span>
                                            </span>
                                            <span class="pointer-events-none absolute inset-y-0 right-0 ml-3 flex items-center pr-2">
                                                <svg class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                    <path fill-rule="evenodd" d="M10 3a.75.75 0 01.55.24l3.25 3.5a.75.75 0 11-1.1 1.02L10 4.852 7.3 7.76a.75.75 0 01-1.1-1.02l3.25-3.5A.75.75 0 0110 3zm-3.76 9.2a.75.75 0 011.06.04l2.7 2.908 2.7-2.908a.75.75 0 111.1 1.02l-3.25 3.5a.75.75 0 01-1.1 0l-3.25-3.5a.75.75 0 01.04-1.06z" clip-rule="evenodd" />
                                                </svg>
                                            </span>
                                        </button>
                                        <ul class="dark:bg-slate-800 absolute z-10 mt-1 max-h-56 w-full overflow-auto rounded-md bg-white py-1 text-base shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none sm:text-sm" tabindex="-1" role="listbox" aria-labelledby="listbox-label" aria-activedescendant="listbox-option-3">
                                            <li class="relative cursor-default select-none py-2 pl-3 pr-9" id="listbox-option-0" role="option">
                                                <div class="flex items-center">
                                                    <span class="font-normal ml-3 block truncate">Feminino</span>
                                                </div>
                                            </li>
                                            <hr class="text-gray-700">
                                            <li class="relative cursor-default select-none py-2 pl-3 pr-9" id="listbox-option-0" role="option">
                                                <div class="flex items-center">
                                                    <span class="font-normal ml-3 block truncate">Masculino</span>
                                                </div>
                                            </li>
                                        </ul>
                                    </div> -->
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
                                            <option value="Solteiro(a)">Solteiro(a)</option>
                                            <option value="Casado(a)">Casado(a)</option>
                                            <option value="Separado(a)">Separado(a)</option>
                                            <option value="Divorciado(a)">Divorciado(a)</option>
                                            <option value="Viúvo(a)">Viúvo(a)</option>
                                        </select>
                                        <!-- <button type="button" id="estadoCivil" name="estadoCivil" required autofocus class="dark:bg-slate-800 relative w-full cursor-default rounded-md bg-white py-1.5 pl-3 pr-10 text-left text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:outline-none focus:ring-2 sm:text-sm sm:leading-6" aria-haspopup="listbox" aria-expanded="true" aria-labelledby="listbox-label">
                                            <span class="flex items-center">
                                                <span class="ml-1 block truncate text-gray-500">Escolha uma opção</span>
                                            </span>

                                            <span class="pointer-events-none absolute inset-y-0 right-0 ml-3 flex items-center pr-2">
                                                <svg class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                    <path fill-rule="evenodd" d="M10 3a.75.75 0 01.55.24l3.25 3.5a.75.75 0 11-1.1 1.02L10 4.852 7.3 7.76a.75.75 0 01-1.1-1.02l3.25-3.5A.75.75 0 0110 3zm-3.76 9.2a.75.75 0 011.06.04l2.7 2.908 2.7-2.908a.75.75 0 111.1 1.02l-3.25 3.5a.75.75 0 01-1.1 0l-3.25-3.5a.75.75 0 01.04-1.06z" clip-rule="evenodd" />
                                                </svg>
                                            </span>
                                        </button>
                                        <ul class="dark:bg-slate-800 absolute z-10 mt-1 max-h-56 w-full overflow-auto rounded-md bg-white py-1 text-base shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none sm:text-sm" tabindex="-1" role="listbox" aria-labelledby="listbox-label" aria-activedescendant="listbox-option-3">
                                            <li class="relative cursor-default select-none py-2 pl-3 pr-9" id="listbox-option-0" role="option">
                                                <div class="flex items-center">
                                                    <span class="font-normal ml-3 block truncate">Solteiro(a)</span>
                                                </div>
                                            </li>
                                            <hr class="text-gray-700">
                                            <li class="relative cursor-default select-none py-2 pl-3 pr-9" id="listbox-option-0" role="option">
                                                <div class="flex items-center">
                                                    <span class="font-normal ml-3 block truncate">Casado(a)</span>
                                                </div>
                                            </li>
                                            <hr class="text-gray-700">
                                            <li class="relative cursor-default select-none py-2 pl-3 pr-9" id="listbox-option-0" role="option">
                                                <div class="flex items-center">
                                                    <span class="font-normal ml-3 block truncate">Divorciado(a)</span>
                                                </div>
                                            </li>
                                            <hr class="text-gray-700">
                                            <li class="relative cursor-default select-none py-2 pl-3 pr-9" id="listbox-option-0" role="option">
                                                <div class="flex items-center">
                                                    <span class="font-normal ml-3 block truncate">Separado(a)</span>
                                                </div>
                                            </li>
                                            <hr class="text-gray-700">
                                            <li class="relative cursor-default select-none py-2 pl-3 pr-9" id="listbox-option-0" role="option">
                                                <div class="flex items-center">
                                                    <span class="font-normal ml-3 block truncate">Viúvo(a)</span>
                                                </div>
                                            </li>
                                        </ul>
                                    </div> -->
                                    <x-input-error class="mt-2" :messages="$errors->get('estadoCivil')" />
                                </div>

                                <div class="">
                                    <label for="especialidade">Especialidade</label>
                                    <input id="especialidade" name="especialidade" type="text" class="dark:bg-slate-800 relative w-full cursor-default rounded-md bg-white py-1.5 pl-3 pr-10 text-left shadow-sm ring-1 ring-inset ring-gray-300 focus:outline-none focus:ring-2 sm:text-sm sm:leading-6" required autofocus />
                                    <x-input-error class="mt-2" :messages="$errors->get('especialidade')" />
                                </div>

                                <div class="">
                                    <label for="crm">CRM</label>
                                    <input x-mask="999999" id="crm" name="crm" type="text" class="dark:bg-slate-800 relative w-full cursor-default rounded-md bg-white py-1.5 pl-3 pr-10 text-left shadow-sm ring-1 ring-inset ring-gray-300 focus:outline-none focus:ring-2 sm:text-sm sm:leading-6" required autofocus />
                                    <x-input-error class="mt-2" :messages="$errors->get('crm')" />
                                </div>

                                <div class="">
                                    <label for="user_id">ID</label>
                                    <input id="user_id" name="user_id" type="text" class="dark:bg-slate-800 relative w-full cursor-default rounded-md bg-white py-1.5 pl-3 pr-10 text-left shadow-sm ring-1 ring-inset ring-gray-300 focus:outline-none focus:ring-2 sm:text-sm sm:leading-6" required autofocus />
                                    <x-input-error class="mt-2" :messages="$errors->get('user_id')" />
                                </div>
                            </div>

                            <div class="">
                                <x-primary-button type="submit">{{ __('Enviar') }}</x-primary-button>
                                <x-primary-button type="reset">{{ __('Limpar') }}</x-primary-button>
                            </div>
                        <!-- <div>
                            <x-input-label for="sobrenome" :value="__('Sobrenome')" />
                            <x-text-input id="sobrenome" name="sobrenome" type="text" class="mt-1 block w-full" required autofocus />
                            <x-input-error class="mt-2" :messages="$errors->get('sobrenome')" />
                        </div>
                        <div>
                            <x-input-label for="dataNasc" :value="__('Data de Nascimento')" />
                            <x-text-input id="dataNasc" name="dataNasc" type="date" class="mt-1 block w-full" required autofocus />
                            <x-input-error class="mt-2" :messages="$errors->get('dataNasc')" />
                        </div>
                        <div>
                            <x-input-label for="sexo" :value="__('Sexo')" />
                            <x-text-input id="sexo" name="sexo" type="text" class="mt-1 block w-full" required autofocus />
                            <x-input-error class="mt-2" :messages="$errors->get('sexo')" />
                        </div>
                        <div>
                            <x-input-label for="rg" :value="__('RG')" />
                            <x-text-input x-mask="99.999.999-9" id="rg" name="rg" type="text" class="mt-1 block w-full" required autofocus />
                            <x-input-error class="mt-2" :messages="$errors->get('rg')" />
                        </div>
                        <div>
                            <x-input-label for="cpf" :value="__('CPF')" />
                            <x-text-input x-mask="999.999.999-99" id="cpf" name="cpf" type="text" class="mt-1 block w-full" required autofocus />
                            <x-input-error class="mt-2" :messages="$errors->get('cpf')" />
                        </div>
                        <div>
                            <x-input-label for="fone" :value="__('Telefone')" />
                            <x-text-input x-mask="(99) 99999-9999" id="fone" name="fone" type="text" class="mt-1 block w-full" required autofocus />
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
                            <x-text-input x-mask="999999" id="crm" name="crm" type="text" class="mt-1 block w-full" required autofocus />
                            <x-input-error class="mt-2" :messages="$errors->get('crm')" />
                        </div>
                        <div>
                            <x-input-label for="user_id" :value="__('ID')" />
                            <x-text-input id="user_id" name="user_id" type="text" class="mt-1 block w-full" required autofocus />
                            <x-input-error class="mt-2" :messages="$errors->get('user_id')" />
                        </div>
                        
                        <div class="flex items-center gap-4 mt-4">
                            <x-primary-button type="submit">{{ __('Enviar') }}</x-primary-button>
                            <x-primary-button type="reset">{{ __('Limpar') }}</x-primary-button>
                        </div> -->
                    </form>
                </x-form-modal>
               
                <div>
                <span class="text-gray-500"> Médicos </span>  
                    <div class="-mt-2 mb-3">                    
                        <div class="mt-5 rounded-xl dark:bg-slate-800/25">
                            <div class="py-3">
                                <div class="shadow-sm rounded-t-xl bg-purple-300 my-1">
                                    <div class="grid grid-cols-8 border-collapse w-full">
                                        <span class="font-medium mt-8 p-4 pr-8 pt-0 pb-3 text-slate-700 dark:text-slate-700 text-left my-5">ID</span>
                                        <span class="font-medium mt-8 p-4 pr-8 pt-0 pb-3 text-slate-700 dark:text-slate-700 text-left">Imagem</span>
                                        <span class="font-medium mt-8 p-4 pr-8 pt-0 pb-3 text-slate-700 dark:text-slate-700 text-left">Nome</span>
                                        <span class="font-medium mt-8 p-4 pr-8 pt-0 pb-3 text-slate-700 dark:text-slate-700 text-left">Sobrenome</span>
                                        <span class="font-medium mt-8 p-4 pr-8 pt-0 pb-3 text-slate-700 dark:text-slate-700 text-left">Telefone</span>
                                        <span class="font-medium mt-8 p-4 pr-8 pt-0 pb-3 text-slate-700 dark:text-slate-700 text-left">CRM</span>
                                        <span class="font-medium mt-8 p-4 pr-8 pt-0 pb-3 text-slate-700 dark:text-slate-700 text-left">Sexo</span>
                                        <span class="font-medium mt-8 p-4 pr-8 pt-0 pb-3 text-slate-700 dark:text-slate-700 text-left">Especialidade</span>
                                    </div>
                                </div>
                            </div>
                            @forelse ($medicos as $medicos)
                            @php
                                //Randomizacao de imagens
                                $numAleatorio = rand(1, 28);
                                if($numAleatorio < 10)
                                    $stringImg = 'p00'.$numAleatorio;
                                else
                                    $stringImg = 'p0'.$numAleatorio;
                                //pega foto da pasta public
                                $caminhoImg = 'storage/profile/'.$stringImg.'.png';
                                        @endphp 
                            <div class="grid grid-cols-8 bg-white dark:bg-slate-800">
                                <span class="text-sm border-b border-l border-slate-100 dark:border-slate-700 p-4 pl-3 py-10 text-slate-500 dark:text-slate-400 my-1/2">{{ $medicos->id }}</span>
                                <span class="text-sm border-b border-slate-100 dark:border-slate-700 p-4 pl-3 text-slate-500 dark:text-slate-400 my-1/2"><img class="rounded-full" src="{{asset($caminhoImg)}}"/></span>
                                <span class="text-sm border-b border-slate-100 dark:border-slate-700 p-4 pl-3 py-10 text-slate-500 dark:text-slate-400">{{ Str::ucfirst($medicos->nome); }}</span>
                                <span class="text-sm border-b border-slate-100 dark:border-slate-700 p-4 pl-3 py-10 text-slate-500 dark:text-slate-400">{{ Str::ucfirst($medicos->sobrenome); }}</span>
                                <span class="text-sm border-b border-slate-100 dark:border-slate-700 p-4 pl-3 py-10 text-slate-500 dark:text-slate-400">{{ $medicos->fone }}</span>
                                <span class="text-sm border-b border-slate-100 dark:border-slate-700 p-4 pl-3 py-10 text-slate-500 dark:text-slate-400">{{ $medicos->crm }}</span>
                                <span class="text-sm border-b border-slate-100 dark:border-slate-700 p-4 pl-3 py-10 text-slate-500 dark:text-slate-400">{{ $medicos->sexo }}</span>
                                <span class="text-sm border-b border-r border-slate-100 dark:border-slate-700 p-4 pl-3 py-10 text-slate-500 dark:text-slate-400">{{ $medicos->especialidade }}</span>
                            </div>
                            @empty
                                <div>
                                    <img src="semresultado.png">
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
    // // Get the button element and the list of options
    // const button = document.querySelector('#sexo');
    // const optionsList = document.querySelectorAll('ul[role="listbox"]');

    // // Add event listener to the button to toggle the options list
    // button.addEventListener('click', () => {
    // optionsList.forEach(list => {
    //     list.classList.toggle('hidden'); // Toggle the visibility of the options list
    // });

    // const expanded = button.getAttribute('aria-expanded');
    //     button.setAttribute('aria-expanded', expanded === 'true' ? 'false' : 'true'); // Toggle the aria-expanded attribute
    // });

    // // Add event listeners to options for handling selections
    // optionsList.forEach(list => {
    //     const options = list.querySelectorAll('li[role="option"]');
    //     options.forEach(option => {
    //         option.addEventListener('click', () => {
    //             const text = option.querySelector('.block.truncate').textContent;
    //             button.querySelector('.block.truncate').textContent = text;

    //             optionsList.forEach(list => {
    //                 list.classList.add('hidden'); // Hide the options list
    //             });

    //             button.setAttribute('aria-expanded', 'false'); // Set aria-expanded to false
    //         });
    //     });
    // });

    // // Close the options list when clicking outside of it
    // document.addEventListener('click', event => {
    //     if (!button.contains(event.target)) {
    //         optionsList.forEach(list => {
    //             list.classList.add('hidden'); // Hide the options list
    //         });

    //         button.setAttribute('aria-expanded', 'false'); // Set aria-expanded to false
    //     }
    // });
</script>