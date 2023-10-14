<div>
<div>
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 dark:text-gray-200 font-bold">
            <div>
                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        Livewire.on('show-delete-modal', function (data) {
                            if (confirm('Are you sure you want to delete this user?')) {
                                Livewire.emit('deleteUser', data.id);
                            }
                        });
                    });
                </script>
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

                <x:modals.user.create />
                
                <span class="text-gray-500">Usuários</span>
                <div class="-mt-2 mb-3">
                    <div class="not-prose relative mt-5 rounded-xl overflow-hidden dark:bg-slate-800/25">
                        <div class="relative py-3">
                            <div class="shadow-sm rounded-t-xl bg-purple-300  overflow-hidden my-1">
                                <div class="grid grid-cols-6 items-center justify-center border-collapse w-full">
                                    <span class="font-medium text-slate-700 dark:text-slate-700 text-center my-5">ID</span>
                                    <span class="font-medium text-slate-700 dark:text-slate-700 text-center">Imagem</span>
                                    <span class="font-medium text-slate-700 dark:text-slate-700 text-center">Nome</span>
                                    <span class="font-medium text-slate-700 dark:text-slate-700 text-center">Email</span>
                                    <span class="font-medium text-slate-700 dark:text-slate-700 text-center">Tipo</span>
                                    <span class="font-medium text-slate-700 dark:text-slate-700 text-center">Opcoes</span>
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
                                @forelse ($users as $user)
                                    @php
                                        $userId = $user->id;
                                        $imgIndex = $userId % $fileCount;
                                        $imgIndex = $imgIndex == 0 ? $fileCount : $imgIndex;
                                        $imgPath = 'profilePics/'.$imgIndex.'.svg';
                                    @endphp     
                                    <div class="grid grid-cols-6 bg-white dark:bg-slate-800">
                                        <span class="text-sm border-b border-l border-slate-100 dark:border-slate-700 p-4 pl-3 py-10 text-slate-500 dark:text-slate-400 my-1/2 text-center">{{ $user->id }}</span>
                                        <span class="text-sm border-b border-slate-100 dark:border-slate-700 p-4 pl-3 text-slate-500 dark:text-slate-400 items-center flex justify-center">
                                            <img class="rounded-full" src="{{ asset($imgPath) }}" />
                                        </span>  
                                        <span class="text-sm border-b border-slate-100 dark:border-slate-700 p-4 pl-3 py-10 text-slate-500 dark:text-slate-400 text-center">{{ $user->name }}</span>
                                        <span class="text-sm border-b border-slate-100 dark:border-slate-700 p-4 pl-3 py-10 text-slate-500 dark:text-slate-400 text-center">{{ $user->email }}</span>
                                        <span class="text-sm border-b border-r border-slate-100 dark:border-slate-700 p-4 pl-3 py-10 text-slate-500 dark:text-slate-400 text-center">{{ Str::ucfirst($user->role); }}</span>
                                        <span class="text-sm border-b border-r border-slate-100 dark:border-slate-700 p-4 pl-3 py-10 text-slate-500 dark:text-slate-400 text-center"> 
                                            <a href="{{ route('crudUser.edit', ['id' => $user->id]) }}">Editar</a>
                                            <button type="button"
                                                wire:click="confirmDelete({{ $user->id }})"
                                                class="text-red-600 hover:text-red-900"
                                                wire:confirm.prompt='Tem certeza que deseja deletar o usuário {{ $user->name }}?\n\nType&quot;{{ $user->name }}&quot; to confirm|{{$user->name}}'
                                            >
                                                Deletar
                                            </button> 
                                            
                                            {{-- delete form --}}
                                        </span>
                                    </div>
                                @empty
                                    <div>
                                        <img src="semresultado.png">
                                    </div>
                                @endforelse
                                
                            </div>
                            <div class=" mt-6 mb-2">
                                {{ $users->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
