<div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
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
                                <x-input-label for="search" :value="__('Search')" />
                                    <x-text-input name="estado" type="text" class="mt-1 block w-full" wire:model="search" />
                                <x-input-error class="mt-2" :messages="$errors->get('search')" />
                            </div>
                            <table>
                                <th> Usuários </th>
                                <tr>
                                    <td> ID </td>
                                    <td> Nome </td>
                                    <td> email </td>
                                    <td> tipo </td>
                                    <td> Criado em: </td>
                                    <td> atualizado em: </td>
                                </tr>
                                @forelse ($users as $users)
                                    <tr>
                                        <td> {{ $users->id }} </td>
                                        <td> {{ $users->name }} </td>
                                        <td> {{ $users->email }} </td>
                                        <td> {{ $users->tipo }} </td>
                                        <td> {{ $users->created_at }} </td>
                                        <td> {{ $users->updated_at }} </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6">No Record Found</td>
                                    </tr>
                                @endforelse
                            </table>
                        </div>

                        <div> {{-- Div paciente --}}
                            <table>
                                <th> Pacientes </th>
                                <tr>
                                    <td> ID </td>
                                    <td> Nome </td>
                                    <td> CPF </td>
                                    <td> Data de nascimento </td>
                                    <td> Telefone </td>
                                    <td> Sexo </td>
                                    <td> Opcoes </td>
                                </tr>
                                @forelse ($pacientes as $pacientes)
                                    <tr>
                                        <td> {{ $pacientes->id }} </td>
                                        <td> {{ $pacientes->name }} </td>
                                        <td> {{ $pacientes->cpf }} </td>
                                        <td> {{ $pacientes->data_nasc }} </td>
                                        <td> {{ $pacientes->telefone }} </td>
                                        <td> {{ $pacientes->sexo }} </td>
                                        <td> 
                                            <button wire:click="edit({{ $pacientes->id }})"> Editar </button>
                                            <button wire:click="delete({{ $pacientes->id }})"> Deletar </button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6">No Record Found</td>
                                    </tr>
                                @endforelse
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>