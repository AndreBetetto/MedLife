<div>
<div>
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 dark:text-gray-200 font-bold">
            <div wire:poll.visible>
                <div wire:poll.keep-alive>
                    Current time: {{ now() }}
                </div>
                
                <x-input-label :value="__('Pesquisar')" />
                <div class="flex space-x-5">                        
                    <x-text-input name="search" type="text" class="mt-1 block w-80" wire:model="search" />
                    <x-input-error class="mt-2" :messages="$errors->get('search')" />
                </div>

                <div class="flex justify-between space-x-5 py-5">
                    <div class="">
                        <a href="{{ route('crudUser.index') }}" class="inline-block rounded bg-purple-300 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-purple-300 transition duration-150 ease-in-out hover:bg-purple-500 hover:shadow-purple-600 focus:bg-primary-600 focus:outline-none focus:ring-0 active:bg-primary-700">Usuários</a>
                        <a href="{{ route('crudPaciente.index') }}" class="inline-block rounded bg-purple-300 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-purple-300 transition duration-150 ease-in-out hover:bg-purple-500 hover:shadow-purple-600 focus:bg-primary-600 focus:outline-none focus:ring-0 active:bg-primary-700">Pacientes</a>
                        <a href="{{ route('adminmedico.index') }}" class="inline-block rounded bg-purple-300 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-purple-300 transition duration-150 ease-in-out hover:bg-purple-500 hover:shadow-purple-600 focus:bg-primary-600 focus:outline-none focus:ring-0 active:bg-primary-700">Médicos</a>
                    </div>
                </div>

              
                @if (session()->has('message'))
                <div>
                    {{ session('message') }}
                </div>
                @endif

                
                <span class="text-gray-500">Usuários</span>
                <div class="-mt-2 mb-3">
                    <div class="not-prose relative mt-5 rounded-xl overflow-hidden dark:bg-slate-800/25">
                        <div class="relative py-3">
                            <div class="shadow-sm rounded-t-xl bg-purple-300  overflow-hidden my-1">
                                <div class="grid grid-cols-5 items-center justify-center border-collapse w-full">
                                    <span class="font-medium text-slate-700 dark:text-slate-700 text-center my-5">ID</span>
                                    <span class="font-medium text-slate-700 dark:text-slate-700 text-center">Imagem</span>
                                    <span class="font-medium text-slate-700 dark:text-slate-700 text-center">Nome</span>
                                    <span class="font-medium text-slate-700 dark:text-slate-700 text-center">Email</span>
                                    <span class="font-medium text-slate-700 dark:text-slate-700 text-center">Tipo</span>
                                </div>
                                @forelse ($users as $users)
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
                                <div class="grid grid-cols-5 bg-white dark:bg-slate-800">
                                        <span class="text-sm border-b border-l border-slate-100 dark:border-slate-700 p-4 pl-3 py-10 text-slate-500 dark:text-slate-400 my-1/2 text-center">{{ $users->id }}</span>
                                        <span class="text-sm border-b border-slate-100 dark:border-slate-700 p-4 pl-3 text-slate-500 dark:text-slate-400 items-center flex justify-center">
                                            <img class="rounded-full" src="{{ asset($caminhoImg) }}" />
                                        </span>  
                                        <span class="text-sm border-b border-slate-100 dark:border-slate-700 p-4 pl-3 py-10 text-slate-500 dark:text-slate-400 text-center">{{ $users->name }}</span>
                                        <span class="text-sm border-b border-slate-100 dark:border-slate-700 p-4 pl-3 py-10 text-slate-500 dark:text-slate-400 text-center">{{ $users->email }}</span>
                                        <span class="text-sm border-b border-r border-slate-100 dark:border-slate-700 p-4 pl-3 py-10 text-slate-500 dark:text-slate-400 text-center">{{ Str::ucfirst($users->role); }}</span>
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
</div>
