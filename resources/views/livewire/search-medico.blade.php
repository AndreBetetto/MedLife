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
            
            <x:modals.medico.create :specializations='$specializations' :userList='$userList'/>
            
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
                        @forelse ($medicos as $medico)
                            @php
                                $imgIndex = $medico->id % $fileCount;
                                $imgIndex = $imgIndex == 0 ? $fileCount : $imgIndex;
                                $imgPath = 'profilePics/'.$imgIndex.'.svg';
                            @endphp 
                            <div class="grid grid-cols-8 bg-white dark:bg-slate-800">
                                <span class="text-sm border-b border-l border-slate-100 dark:border-slate-700 p-4 pl-3 py-10 text-slate-500 dark:text-slate-400 my-1/2 text-center">{{ $medico->id }}</span>
                                <span class="text-sm border-b border-slate-100 dark:border-slate-700 p-4 pl-3 text-slate-500 dark:text-slate-400 items-center flex justify-center">
                                    <img class="rounded-full" src="{{ asset($imgPath) }}" />
                                </span>                                
                                <span class="text-sm border-b border-slate-100 dark:border-slate-700 p-4 pl-3 py-10 text-slate-500 dark:text-slate-400 text-center">{{ Str::ucfirst($medico->nome); }}</span>
                                <span class="text-sm border-b border-slate-100 dark:border-slate-700 p-4 pl-3 py-10 text-slate-500 dark:text-slate-400 text-center">{{ Str::ucfirst($medico->sobrenome); }}</span>
                                <span class="text-sm border-b border-slate-100 dark:border-slate-700 p-4 pl-3 py-10 text-slate-500 dark:text-slate-400 text-center">{{ $medico->fone }}</span>
                                <span class="text-sm border-b border-slate-100 dark:border-slate-700 p-4 pl-3 py-10 text-slate-500 dark:text-slate-400 text-center">{{ $medico->crm }}</span>
                                <span class="text-sm border-b border-slate-100 dark:border-slate-700 p-4 pl-3 py-10 text-slate-500 dark:text-slate-400 text-center">{{ $medico->sexo }}</span>
                                <span class="text-sm border-b border-r border-slate-100 dark:border-slate-700 p-4 pl-3 py-10 text-slate-500 dark:text-slate-400 text-center">{{ $medico->especialidade }}</span>
                            </div>
                            @empty
                                <div>
                                    <img src="semresultado.png">
                                </div>
                            @endforelse
                        </div>
                    </div>
                    <div class=" mt-6 mb-2">
                        {{ $medicos->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>