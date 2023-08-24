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
                            <div class="grid grid-cols-6 bg-blue-100 border border-indigo-600">
                                <span class="border-x border-indigo-600">ID</span>
                                <span class="border-x border-indigo-600">Nome</span>
                                <span class="border-x border-indigo-600">Email</span>
                                <span class="border-x border-indigo-600">Tipo</span>
                                <span class="border-x border-indigo-600">Criado em:</span>
                                <span class="border-x border-indigo-600">Atualizado em:</span>
                            </div>
                        </div>
                        @forelse ($users as $users)
                            <div class="grid grid-cols-6 border border-indigo-600">{{ $users->id }}</label>
                                <span class="border-x border-indigo-600"> {{ $users->name }} </span>
                                <span class="border-x border-indigo-600"> {{ $users->email }} </span>
                                <span class="border-x border-indigo-600"> {{ $users->tipo }} </span>
                                <span class="border-x border-indigo-600"> {{ $users->created_at }} </span>
                                <span class="border-x border-indigo-600"> {{ $users->updated_at }} </span>
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
                        <div>
                            <span> ID </span>
                            <span> Nome </span>
                            <span> CPF </span>
                            <span> Data de nascimento </span>
                            <span> Telefone </span>
                            <span> Sexo </span>
                            <span> Opções </span>
                        </div>
                        @forelse ($pacientes as $pacientes)
                            <div>
                                <span> {{ $pacientes->id }} </span>
                                <span> {{ $pacientes->name }} </span>
                                <span> {{ $pacientes->cpf }} </span>
                                <span> {{ $pacientes->data_nasc }} </span>
                                <span> {{ $pacientes->telefone }} </span>
                                <span> {{ $pacientes->sexo }} </span>
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