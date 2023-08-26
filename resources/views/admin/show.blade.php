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
                    <div>
                        <div>
                            <span> Usuários </span>
                            <div class="grid grid-cols-table bg-slate-500 border border-black">
                                <span class="border-x border-black text-center">ID</span>
                                <span class="border-x border-black">Nome</span>
                                <span class="border-x border-black">Email</span>
                                <span class="border-x border-black">Tipo</span>
                            </div>
                        </div>
                        @forelse ($users as $users)
                            <div class="grid grid-cols-table border border-black">
                                <span class="border-x border-black text-center">{{ $users->id }}</span>
                                <span class="border-x border-black"> {{ $users->name }} </span>
                                <span class="border-x border-black"> {{ $users->email }} </span>
                                <span class="border-x border-black"> {{ $users->tipo }} </span>
                            </div>
                        @empty
                            <div>
                                <span>Sem dados</span>
                            </div>
                        @endforelse
                    </div>
                </div>

                <div> {{-- Div paciente --}}
                    <div>
                        <span> Pacientes </span>
                        <div class="grid grid-cols-large-table border border-black">
                            <span class="border-x border-black text-center"> ID </span>
                            <span class="border-x border-black"> Nome </span>
                            <span class="border-x border-black"> CPF </span>
                            <span class="border-x border-black"> Data de nascimento </span>
                            <span class="border-x border-black"> Telefone </span>
                            <span class="border-x border-black"> Sexo </span>
                            <span class="border-x border-black"> Opções </span>
                        </div>
                        @forelse ($pacientes as $pacientes)
                            <div class="grid grid-cols-large-table border border-black">
                                <span class="border-x border-black text-center"> {{ $pacientes->id }} </span>
                                <span class="border-x border-black"> {{ $pacientes->name }} </span>
                                <span class="border-x border-black"> {{ $pacientes->cpf }} </span>
                                <span class="border-x border-black"> {{ $pacientes->data_nasc }} </span>
                                <span class="border-x border-black"> {{ $pacientes->telefone }} </span>
                                <span class="border-x border-black"> {{ $pacientes->sexo }} </span>
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