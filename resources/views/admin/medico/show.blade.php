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
                <x-form-modal>
                    <div>
                        <div>
                            <form action="{{ route('adminmedico.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div>
                                    <x-input-label for="nome" :value="__('Nome')" />
                                    <x-text-input id="nome" name="nome" type="text" class="mt-1 block w-full"  required autofocus />
                                    <x-input-error class="mt-2" :messages="$errors->get('nome')" />
                                </div>
                                <div>
                                    <x-input-label for="sobrenome" :value="__('Sobrenome')" />
                                    <x-text-input id="sobrenome" name="sobrenome" type="text" class="mt-1 block w-full" required autofocus />
                                    <x-input-error class="mt-2" :messages="$errors->get('sobrenome')" />
                                </div>
                                <div>
                                    <x-input-label for="dataNasc" :value="__('Data de Nascimento')" />
                                    <x-text-input id="dataNasc" name="dataNasc" type="date" class="mt-1 block w-full" required autofocus />
                                    <x-input-error class="mt-2" :messages="$errors->get('dataNasc')" />
                                </div>
                                <div>
                                    <x-input-label for="sexo" :value="__('Sexo')" />
                                    <x-text-input id="sexo" name="sexo" type="text" class="mt-1 block w-full" required autofocus />
                                    <x-input-error class="mt-2" :messages="$errors->get('sexo')" />
                                </div>
                                <div>
                                    <x-input-label for="rg" :value="__('RG')" />
                                    <x-text-input id="rg" name="rg" type="text" class="mt-1 block w-full" required autofocus />
                                    <x-input-error class="mt-2" :messages="$errors->get('rg')" />
                                </div>
                                <div>
                                    <x-input-label for="cpf" :value="__('CPF')" />
                                    <x-text-input id="cpf" name="cpf" type="text" class="mt-1 block w-full" required autofocus />
                                    <x-input-error class="mt-2" :messages="$errors->get('cpf')" />
                                </div>
                                <div>
                                    <x-input-label for="fone" :value="__('Telefone')" />
                                    <x-text-input id="fone" name="fone" type="text" class="mt-1 block w-full" required autofocus />
                                    <x-input-error class="mt-2" :messages="$errors->get('fone')" />
                                </div>
                                <div>
                                    <x-input-label for="estadoCivil" :value="__('Estado Civil')" />
                                    <x-text-input id="estadoCivil" name="estadoCivil" type="text" class="mt-1 block w-full" required autofocus />
                                    <x-input-error class="mt-2" :messages="$errors->get('estadoCivil')" />
                                </div>
                                <div>
                                    <x-input-label for="especialidade" :value="__('Especialidade')" />
                                    <x-text-input id="especialidade" name="especialidade" type="text" class="mt-1 block w-full" required autofocus />
                                    <x-input-error class="mt-2" :messages="$errors->get('especialidade')" />
                                </div>
                                <div>
                                    <x-input-label for="crm" :value="__('CRM')" />
                                    <x-text-input id="crm" name="crm" type="text" class="mt-1 block w-full" required autofocus />
                                    <x-input-error class="mt-2" :messages="$errors->get('crm')" />
                                </div>
                                <div>
                                    <x-input-label for="user_id" :value="__('ID')" />
                                    <x-text-input id="user_id" name="user_id" type="text" class="mt-1 block w-full" required autofocus />
                                    <x-input-error class="mt-2" :messages="$errors->get('user_id')" />
                                </div>
                                
                                <div class="flex items-center gap-4 mt-4">
                                    <x-primary-button type="submit">{{ __('Submit') }}</x-primary-button>
                                    <x-primary-button type="reset">{{ __('Reset') }}</x-primary-button>
                                </div>
                            </form>
                        </div>
                    </div>
                </x-form-modal>
                <div>
                    <span> Médicos</span>
                    <div class="grid grid-cols-small-table border border-black">
                        <span class="border-x border-black">ID</span>
                        <span class="border-x border-black">Nome</span>
                        <span class="border-x border-black">Sobrenome</span>
                        <span class="border-x border-black">Telefone</span>
                        <span class="border-x border-black">CRM</span>
                        <span class="border-x border-black">Sexo</span>
                        <span class="border-x border-black">Especialidade</span>
                    </div>
                    @forelse ($medicos as $medicos)
                        <div class="grid grid-cols-small-table border border-black">
                            <span class="border-x border-black">{{$medicos->id}}</span>
                            <span class="border-x border-black">{{$medicos->nome}}</span>
                            <span class="border-x border-black">{{$medicos->sobrenome}}</span>
                            <span class="border-x border-black">{{$medicos->fone}}</span>
                            <span class="border-x border-black">{{$medicos->crm}}</span>
                            <span class="border-x border-black">{{$medicos->sexo}}</span>
                            <span class="border-x border-black">{{$medicos->especialidade}}</span>
                        </div>
                    @empty
                        <div>
                            <span>Sem regisdivo</span>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>