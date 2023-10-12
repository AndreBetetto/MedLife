<div>
    <div>
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-200 font-bold">
                
                    @if (session()->has('message'))
                        <div>
                            {{ session('message') }}
                        </div>
                    @endif 

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


                            <div class="mt-4">
                                <label for="especialidade">Specialization</label>
                                <select wire:model="selectedSpecializationProperty" id="especialidade" name="especialidade" class="dark:bg-slate-800 relative w-full cursor-default rounded-md bg-white py-1.5 pl-3 pr-10 text-left shadow-sm ring-1 ring-inset ring-gray-300 focus:outline-none focus:ring-2 sm:text-sm sm:leading-6">
                                    <option value="" disabled selected>Select a especialidade</option>
                                    @foreach($specializations as $specialization)
                                        <option value="{{ $specialization['ID'] }}">{{ $specialization['Name'] }}</option>
                                    @endforeach
                                </select>
                                <!-- You can add x-input-error here if needed -->
                            </div>

                            <script>
                                // Initialize Select2 for the specialization dropdown
                                $(document).ready(function () {
                                    $('#specialization').select2();
                                });
                            </script>

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

                            <div>
                                <label for="user_id">User</label>
                                <select wire:model="search" id="user_id" name="user_id" class="dark:bg-slate-800 relative w-full cursor-default rounded-md bg-white py-1.5 pl-3 pr-10 text-left shadow-sm ring-1 ring-inset ring-gray-300 focus:outline-none focus:ring-2 sm:text-sm sm:leading-6">
                                    <option value="" disabled selected>Select a user</option>
                                    @foreach($users as $user)
                                        @if($user->role == 'user')
                                            <option value="{{ $user->id }}">(ID: {{ $user->id }}) - {{ $user->name }}</option>
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
               

                <span class="text-gray-500"> Médicos </span>  
                <div class="-mt-2 mb-3">                    
                    <div class="not-prose relative mt-5 rounded-xl overflow-hidden dark:bg-slate-800/25">
                        <div class="relative  py-3">
                            <div class="shadow-sm rounded-t-xl bg-purple-300  overflow-hidden my-1">
                                <div class="grid grid-cols-8 items-center justify-center border-collapse w-full">
                                    <span class="font-medium mt-8 p-4 pr-8 pt-0 pb-3 text-slate-700 dark:text-slate-700 text-center my-5">ID</span>
                                    <span class="font-medium mt-8 p-4 pr-8 pt-0 pb-3 text-slate-700 dark:text-slate-700 text-center my-5">Imagem</span>
                                    <span class="font-medium mt-8 p-4 pr-8 pt-0 pb-3 text-slate-700 dark:text-slate-700 text-center my-5">Nome</span>
                                    <span class="font-medium mt-8 p-4 pr-8 pt-0 pb-3 text-slate-700 dark:text-slate-700 text-center my-5">Sobrenome</span>
                                    <span class="font-medium mt-8 p-4 pr-8 pt-0 pb-3 text-slate-700 dark:text-slate-700 text-center my-5">Telefone</span>
                                    <span class="font-medium mt-8 p-4 pr-8 pt-0 pb-3 text-slate-700 dark:text-slate-700 text-center my-5">CRM</span>
                                    <span class="font-medium mt-8 p-4 pr-8 pt-0 pb-3 text-slate-700 dark:text-slate-700 text-center my-5">Sexo</span>
                                    <span class="font-medium mt-8 p-4 pr-8 pt-0 pb-3 text-slate-700 dark:text-slate-700 text-center my-5">Especialidade</span>
                                </div>
                            </div>
                            @php
                                use Illuminate\Support\Facades\File;
                                use Illuminate\Support\Facades\Storage;
                                //$files = Storage::files('profile');
                                $folderPath = public_path('profilePics');
                                if (File::exists($folderPath) && File::isDirectory($folderPath)) {
                                    $files = File::files($folderPath);
                                    $fileCount = count($files);

                                    //echo "Number of files in the folder: $fileCount";
                                } else {
                                    //echo "The specified folder does not exist or is not a directory.";
                                    $fileCount = 1;
                                }
                            @endphp
                            @forelse ($medicos as $medicos)
                                @php
                                    $imgIndex = $medicos->id % $fileCount;
                                    $imgIndex = $imgIndex == 0 ? $fileCount : $imgIndex;
                                    $imgPath = 'profilePics/'.$imgIndex.'.svg';
                                @endphp 
                                <div class="grid grid-cols-8 bg-white dark:bg-slate-800">
                                    <span class="text-sm border-b border-l border-slate-100 dark:border-slate-700 p-4 pl-3 py-10 text-slate-500 dark:text-slate-400 my-1/2 text-center">{{ $medicos->id }}</span>
                                    <span class="text-sm border-b border-slate-100 dark:border-slate-700 p-4 pl-3 text-slate-500 dark:text-slate-400 items-center flex justify-center">
                                        <img class="rounded-full" src="{{ asset($imgPath) }}" />
                                    </span>                                
                                    <span class="text-sm border-b border-slate-100 dark:border-slate-700 p-4 pl-3 py-10 text-slate-500 dark:text-slate-400 text-center">{{ Str::ucfirst($medicos->nome); }}</span>
                                    <span class="text-sm border-b border-slate-100 dark:border-slate-700 p-4 pl-3 py-10 text-slate-500 dark:text-slate-400 text-center">{{ Str::ucfirst($medicos->sobrenome); }}</span>
                                    <span class="text-sm border-b border-slate-100 dark:border-slate-700 p-4 pl-3 py-10 text-slate-500 dark:text-slate-400 text-center">{{ $medicos->fone }}</span>
                                    <span class="text-sm border-b border-slate-100 dark:border-slate-700 p-4 pl-3 py-10 text-slate-500 dark:text-slate-400 text-center">{{ $medicos->crm }}</span>
                                    <span class="text-sm border-b border-slate-100 dark:border-slate-700 p-4 pl-3 py-10 text-slate-500 dark:text-slate-400 text-center">{{ $medicos->sexo }}</span>
                                    <span class="text-sm border-b border-r border-slate-100 dark:border-slate-700 p-4 pl-3 py-10 text-slate-500 dark:text-slate-400 text-center">{{ $medicos->especialidade }}</span>
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