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
                        <x-input-label :value="__('Search')" />
                            <x-text-input name="search" type="text" class="mt-1 block w-full" wire:model="search" />
                        <x-input-error class="mt-2" :messages="$errors->get('search')" />
                    </div>
                    <div>
                        <div>
                            <label> Usuários </label>
                            <div class="grid grid-cols-6 gap-8">
                                <label class="w-10 bg-blue-100 border text-center px-1 py-4">ID</label>
                                <label class="w-30 bg-blue-100 border text-center px-8 py-4">Nome</label>
                                <label class="bg-blue-100 border text-center px-8 py-4">Email</label>
                                <label class="bg-blue-100 border text-center px-8 py-4">Tipo</label>
                                <label class="bg-blue-100 border text-center px-8 py-4">Criado em:</label>
                                <label class="bg-blue-100 border text-center px-8 py-4">Atualizado em:</label>
                            </div>
                        </div>
                        @forelse ($users as $users)
                            <div class="grid grid-cols-6 gap-8">
                                <label class="w-10 border text-center px-1 py-4">{{ $users->id }}</label>
                                <label class="border px-8 py-4"> {{ $users->name }} </label>
                                <label class="border px-8 py-4"> {{ $users->email }} </label>
                                <label class="border px-8 py-4"> {{ $users->tipo }} </label>
                                <label class="border px-8 py-4"> {{ $users->created_at }} </label>
                                <label class="border px-8 py-4"> {{ $users->updated_at }} </label>
                            </div>
                        @empty
                            <div>
                                <label>Sem dados</label>
                            </div>
                        @endforelse
                    </div>
                </div>

                <div> {{-- Div paciente --}}
                    <div>
                        <label> Pacientes </label>
                        <div>
                            <label> ID </label>
                            <label> Nome </label>
                            <label> CPF </label>
                            <label> Data de nascimento </label>
                            <label> Telefone </label>
                            <label> Sexo </label>
                            <label> Opções </label>
                        </div>
                        @forelse ($pacientes as $pacientes)
                            <div>
                                <label> {{ $pacientes->id }} </label>
                                <label> {{ $pacientes->name }} </label>
                                <label> {{ $pacientes->cpf }} </label>
                                <label> {{ $pacientes->data_nasc }} </label>
                                <label> {{ $pacientes->telefone }} </label>
                                <label> {{ $pacientes->sexo }} </label>
                                <div> 
                                    <button wire:click="edit({{ $pacientes->id }})"> Editar </button>
                                    <button wire:click="delete({{ $pacientes->id }})"> Deletar </button>
                                </div>
                            </div>
                        @empty
                            <div>
                                <label>Sem dados</label>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>