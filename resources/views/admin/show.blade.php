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

                <div>
                    <div>
                        <x-input-label :value="__('Pesquisar')" />
                            <x-text-input name="search" type="text" class="mt-1 block w-full" wire:model="search" />
                        <x-input-error class="mt-2" :messages="$errors->get('search')" />
                    </div>
                    <span> Usuários </span>
                    <div class="mt-4 mb-3">
                        <div class="not-prose relative rounded-xl overflow-hidden dark:bg-slate-800/25">
                            <div class="relative rounded-xl bg-purple-300">
                                <div class="shadow-sm overflow-hidden my-8">
                                    <div class="grid grid-cols-table border-collapse w-full">
                                        <span class="font-medium p-4 pl-8 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">ID</span>
                                        <span class="font-medium p-4 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">Nome</span>
                                        <span class="font-medium p-4 pr-8 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">Email</span>
                                        <span class="font-medium p-4 pr-8 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">Tipo</span>
                                    </div>
                                </div>
                                @forelse ($users as $users)
                                    <div class="grid grid-cols-table bg-white dark:bg-slate-800">
                                        <span class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">{{ $users->id }}</span>
                                        <span class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">{{ $users->name }}</span>
                                        <span class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">{{ $users->email }}</span>
                                        <span class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">{{ Str::ucfirst($users->role); }}</span>
                                    </div>
                                @empty
                                    <div>
                                        <span>Sem dados</span>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>

                <div> {{-- Div paciente --}}
                    <span> Pacientes </span>
                    <div class="mt-4 mb-3">
                        <div class="not-prose relative bg-slate-50 rounded-xl overflow-hidden dark:bg-slate-800/25">
                            <div class="relative rounded-xl bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500">
                                <div class="shadow-sm overflow-hidden my-8">
                                    <div class="grid grid-cols-large-table border-collapse w-full">
                                        <span class="font-medium p-4 pl-8 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">ID</span>
                                        <span class="font-medium p-4 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">Nome</span>
                                        <span class="font-medium p-4 pr-8 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">CPF</span>
                                        <span class="font-medium p-4 pr-8 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">Data de nascimento</span>
                                        <span class="font-medium p-4 pr-8 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">Telefone</span>
                                        <span class="font-medium p-4 pr-8 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">Sexo</span>
                                        <span class="font-medium p-4 pr-8 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">Opções</span>
                                    </div>
                                </div>
                                @forelse ($pacientes as $pacientes)
                                    <div class="grid grid-cols-large-table bg-white dark:bg-slate-800">
                                        <span class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">{{ $users->id }}</span>
                                        <span class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">{{ $users->name }}</span>
                                        <span class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">{{ $pacientes->cpf }}</span>
                                        <span class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">{{ $pacientes->dataNasc }}</span>
                                        <span class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">{{ $pacientes->fone }}</span>
                                        <span class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">{{ $pacientes->sexo }}</span>
                                        <div> 
                                            <button wire:click="edit({{ $pacientes->id }})"> Editar </button>
                                            <button wire:click="delete({{ $pacientes->id }})"> Deletar </button>
                                        </div>
                                    </div>
                                @empty
                                    <div>
                                        <span>Sem dados</span>
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