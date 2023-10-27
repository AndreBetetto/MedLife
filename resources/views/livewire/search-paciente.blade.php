<div>
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 dark:text-gray-200">
            <div>
                <x-input-label :value="__('Pesquisar')" />
                <div class="flex space-x-5">                        
                    <x-text-input name="search" type="text" class="mt-1 block w-80" wire:model="search" />
                    <x-input-error class="mt-2" :messages="$errors->get('search')" />
                </div>
                @if (session()->has('message'))
                <div>
                    {{ session('message') }}
                </div>
                @endif

                {{-- to not break modal --}}
                <div wire:ignore class="py-5 flex justify-between w-full">
                    <div class="">
                        <a href="{{ route('crudUser.index') }}" class="inline-block rounded bg-purple-300 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-purple-300 transition duration-150 ease-in-out hover:bg-purple-500 hover:shadow-purple-600 focus:bg-primary-600 focus:outline-none focus:ring-0">Usuários</a>
                        <a href="{{ route('crudPaciente.index') }}" class="inline-block rounded bg-purple-300 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-purple-300 transition duration-150 ease-in-out hover:bg-purple-500 hover:shadow-purple-600 focus:bg-primary-600 focus:outline-none focus:ring-0">Pacientes</a>
                        <a href="{{ route('crudMedico.index') }}" class="inline-block rounded bg-purple-300 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-purple-300 transition duration-150 ease-in-out hover:bg-purple-500 hover:shadow-purple-600 focus:bg-primary-600 focus:outline-none focus:ring-0">Médicos</a>
                    </div>
                    <x:modals.paciente.create :userList='$userList' />
                </div>

                <span class="text-gray-500"> Pacientes </span>
                <div class="-mt-2 mb-3">
                    <div class="not-prose relative mt-5 rounded-xl overflow-hidden dark:bg-slate-800/25">
                        <div class="relative py-3">
                            <div class="shadow-sm rounded-t-xl bg-purple-300  overflow-hidden my-1">
                                <div class="grid grid-cols-8 items-center justify-center border-collapse w-full">
                                    <span class="font-medium mt-8 p-4 pr-8 pt-0 pb-3 text-slate-700 dark:text-slate-700 text-center my-5">ID</span>
                                    <span class="font-medium mt-8 p-4 pr-8 pt-0 pb-3 text-slate-700 dark:text-slate-700 text-center my-5">Imagem</span>
                                    <span class="font-medium mt-8 p-4 pr-8 pt-0 pb-3 text-slate-700 dark:text-slate-700 text-center my-5">Nome</span>
                                    <span class="font-medium mt-8 p-4 pr-8 pt-0 pb-3 text-slate-700 dark:text-slate-700 text-center my-5">CPF</span>
                                    <span class="font-medium mt-8 p-4 pr-8 pt-0 pb-3 text-slate-700 dark:text-slate-700 text-center my-5">Nascimento</span>
                                    <span class="font-medium mt-8 p-4 pr-8 pt-0 pb-3 text-slate-700 dark:text-slate-700 text-center my-5">Telefone</span>
                                    <span class="font-medium mt-8 p-4 pr-8 pt-0 pb-3 text-slate-700 dark:text-slate-700 text-center my-5">Sexo</span>
                                    <span class="font-medium mt-8 p-4 pr-8 pt-0 pb-3 text-slate-700 dark:text-slate-700 text-center my-5">Opções</span>
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
                                @forelse ($pacientes as $paciente)
                                    @php
                                        $imgIndex = $paciente->id % $fileCount;
                                        $imgIndex = $imgIndex == 0 ? $fileCount : $imgIndex;
                                        $imgPath = 'profilePics/'.$imgIndex.'.svg';
                                    @endphp
                                    <div class="grid grid-cols-8 bg-white dark:bg-slate-800">
                                        <span class="text-sm border-b border-l border-slate-100 dark:border-slate-700 p-4 pl-3 py-10 text-slate-500 dark:text-slate-400 my-1/2 text-center">{{ $paciente->id }}</span>
                                        <span class="text-sm border-b border-slate-100 dark:border-slate-700 p-4 pl-3 text-slate-500 dark:text-slate-400 items-center flex justify-center">
                                            <img class="rounded-full" src="{{ asset($imgPath) }}" />
                                        </span>
                                        <span class="text-sm border-b border-slate-100 dark:border-slate-700 p-4 pl-3 py-10 text-slate-500 dark:text-slate-400 text-center">{{ $paciente->nome }}</span>
                                        <span class="text-sm border-b border-slate-100 dark:border-slate-700 p-4 pl-3 py-10 text-slate-500 dark:text-slate-400 text-center">{{ $paciente->cpf }}</span>
                                        <span class="text-sm border-b border-slate-100 dark:border-slate-700 p-4 pl-3 py-10 text-slate-500 dark:text-slate-400 text-center">{{ $paciente->dataNasc }}</span>
                                        <span class="text-sm border-b border-slate-100 dark:border-slate-700 p-4 pl-3 py-10 text-slate-500 dark:text-slate-400 text-center">{{ $paciente->fone }}</span>
                                        <span class="text-sm border-b border-slate-100 dark:border-slate-700 p-4 pl-3 py-10 text-slate-500 dark:text-slate-400 text-center">{{ $paciente->sexo }}</span>
                                        <div class="grid grid-cols-2 gap-2 text-sm border-b border-r border-slate-100 dark:border-slate-700 p-4 pl-3 py-10 text-slate-500 dark:text-slate-400 text-center"> 
                                            <a class="inline-block rounded bg-purple-300 p-2 text-xs font-medium uppercase leading-normal text-white shadow-purple-300 transition duration-150 ease-in-out hover:bg-purple-500 hover:shadow-purple-600 focus:bg-primary-600 focus:outline-none focus:ring-0" href="{{ route('crudUser.edit', ['id' => $paciente->id]) }}">Editar</a>
                                            <button type="button" wire:click="deleteUser('{{ $paciente->id }}')" 
                                                class="inline-block rounded bg-purple-300 p-2 text-xs font-medium uppercase leading-normal text-white shadow-purple-300 transition duration-150 ease-in-out hover:bg-purple-500 hover:shadow-purple-600 focus:bg-primary-600 focus:outline-none focus:ring-0">
                                                Excluir
                                            </button>
                                            {{-- delete form --}}
                                        </div>
                                    </div>
                                @empty
                                    <div class="border">
                                        <img src="semresultado.png">
                                    </div>
                                @endforelse
                                
                                </div>
                            <div class=" mt-6 mb-2">
                                {{ $pacientes->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>