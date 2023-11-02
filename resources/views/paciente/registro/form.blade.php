{{-- Success is as dangerous as failure. --}}
<section class="">

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form action="{{ route('profilepaciente.store') }}" method="POST">
        @csrf
        <input type="hidden" name="user_id" value="{{ $user->id }}">
        <h2 class="col-span-2 text-xl text-center font-medium m-0 gap-0">Informações pessoais</h2>
        <div class="grid gap-2">
            <div class="grid grid-cols-2 gap-4 mt-6">
                <div class="grid gap-4">
                    <div class="bg-purple-100 p-4 rounded-md dark:bg-purple-500">
                        <x-input-label class="" for="nome" :value="__('Nome *')" />
                        <x-text-input class="" id="nome" name="nome" type="text" class="block w-full" value='{{$user->name}}' wire:model.lazy='nome' required autofocus autocomplete="nome" />
                        <x-input-error class="" :messages="$errors->get('nome')" />
                    </div>
                    <div class="bg-purple-100 p-4 rounded-md dark:bg-purple-500">
                        <x-input-label class="" for="sobrenome" :value="__('Sobrenome *')" />
                        <x-text-input class="" id="sobrenome" name="sobrenome" type="text" class="block w-full" wire:model.lazy='sobrenome' required autofocus autocomplete="sobrenome" />
                        <x-input-error class="" :messages="$errors->get('sobrenome')" />
                    </div>
                    <div class="bg-purple-100 p-4 rounded-md dark:bg-purple-500">
                        <x-input-label for="dataNasc" :value="__('Data de nascimento *')" />
                        <x-text-input id="dataNasc" name="dataNasc" type="date" class=" block w-full" wire:model.lazy='dataNasc' required autofocus autocomplete="dataNasc" />
                        <x-input-error class="mt-2" :messages="$errors->get('dataNasc')" />
                    </div>
                    <div class="bg-purple-100 p-4 rounded-md dark:bg-purple-500">
                        <x-input-label for="cpf" :value="__('CPF *')" />
                        <x-text-input id="cpf" name="cpf" x-mask="999.999.999-99" type="text" class=" block w-full" :value="old('cpf', $user->cpf)" wire:model.lazy='cpf' required autofocus autocomplete="cpf" />
                        <x-input-error class="mt-2" :messages="$errors->get('cpf')" />
                    </div>
                    <div class="bg-purple-100 p-4 rounded-md dark:bg-purple-500">
                        <x-input-label for="rg" :value="__('RG *')" />
                        <x-text-input id="rg" name="rg" x-mask="99.999.999-9" type="text" class=" block w-full" :value="old('rg', $user->rg)" wire:model.lazy='rg' required autofocus autocomplete="rg" />
                        <x-input-error class="mt-2" :messages="$errors->get('rg')" />
                    </div>
                    <div class="bg-purple-100 p-4 rounded-md dark:bg-purple-500">
                        <x-input-label for="sexo" :value="__('Sexo *')" />
                        {{-- 
                        <x-text-input id="sexo" name="sexo" type="text" class=" block w-full" :value="old('sexo', $user->sexo)" wire:model.lazy='sexo' required autofocus autocomplete="sexo" />
                        --}}
                        
                        <select id="sexo" name="sexo" class=" block w-full rounded-sm border-spacing-0">
                            <option value="Masc">Masculino</option>
                            <option value="Fem">Feminino</option>
                        </select>
                        <x-input-error class="mt-2" :messages="$errors->get('sexo')" />
                    </div>
                    <div class="bg-purple-100 p-4 rounded-md dark:bg-purple-500">
                        <x-input-label for="fone" :value="__('Telefone *')" />
                        <x-text-input id="fone" name="fone" x-mask="(99) 99999-9999" type="text" class=" block w-full" :value="old('fone', $user->fone)" wire:model.lazy='fone' required autofocus autocomplete="fone" />
                        <x-input-error class="mt-2" :messages="$errors->get('fone')" />
                    </div>
                </div>
                <div class="grid gap-4">   
                    <div class="bg-purple-100 p-4 rounded-md dark:bg-purple-500">
                        <x-input-label for="estadoCivil" :value="__('Estado Civil *')" />
                        {{-- 
                        <x-text-input id="estadoCivil" name="estadoCivil"  type="text" class=" block w-full" :value="old('estadoCivil', $user->estadoCivil)" wire:model.lazy='estadoCivil' required autofocus autocomplete="estadoCivil" />
                        --}}
                        <select id="estadoCivil" name="estadoCivil" class=" block w-full rounded-sm border-spacing-0">
                            <option value="Solteiro">Solteiro</option>
                            <option value="Casado">Casado</option>
                            <option value="Separado">Separado</option>
                            <option value="Divorciado">Divorciado</option>
                            <option value="Viuvo">Viúvo</option>
                        </select>
                        <x-input-error class="mt-2" :messages="$errors->get('estadoCivil')" />
                    </div>     
                    <div class="bg-purple-100 p-4 rounded-md dark:bg-purple-500">
                        <x-input-label for="cep" :value="__('CEP')" />
                        <x-text-input id="cep" name="cep" type="text" x-mask="99999-999" class=" block w-full" :value="old('cep', $user->cep)" wire:model.lazy='cep' autofocus autocomplete="cep" />
                        <x-input-error class="mt-2" :messages="$errors->get('cep')" />
                    </div>
                    <div class="bg-purple-100 p-4 rounded-md flex gap-2 dark:bg-purple-500">
                        <div class="w-full">
                            <x-input-label for="logradouro" :value="__('Logradouro')" />
                            <x-text-input id="logradouro" name="logradouro" type="text" class=" block w-full" :value="old('logradouro', $user->logradouro)" wire:model.lazy='logradouro' autofocus autocomplete="logradouro" />
                            <x-input-error class="mt-2" :messages="$errors->get('logradouro')" />
                        </div>
                        <div>
                            <x-input-label for="numero" :value="__('Número')" />
                            <x-text-input id="numero" name="numero" type="text" x-mask="999" class=" block w-[52px]" :value="old('numero', $user->numero)" wire:model.lazy='numero'  autofocus autocomplete="numero" />
                            <x-input-error class="mt-2" :messages="$errors->get('numero')" />
                        </div>
                    </div>
                    <div class="bg-purple-100 p-4 rounded-md dark:bg-purple-500">
                        <x-input-label for="complemento" :value="__('Complemento')" />
                        <x-text-input id="complemento" name="complemento" type="text" class=" block w-full" :value="old('complemento', $user->complemento)" wire:model.lazy='complemento' autofocus autocomplete="complemento" />
                        <x-input-error class="mt-2" :messages="$errors->get('complemento')" />
                    </div>
                    <div class="bg-purple-100 p-4 rounded-md dark:bg-purple-500">
                        <x-input-label for="bairro" :value="__('Bairro')" />
                        <x-text-input id="bairro" name="bairro" type="text" class=" block w-full" :value="old('bairro', $user->bairro)" wire:model.lazy='bairro' autofocus autocomplete="bairro" />
                        <x-input-error class="mt-2" :messages="$errors->get('bairro')" />
                    </div>
                    <div class="bg-purple-100 p-4 rounded-md dark:bg-purple-500">
                        <x-input-label for="cidade" :value="__('Cidade')" />
                        <x-text-input id="cidade" name="cidade" type="text" class=" block w-full" :value="old('cidade', $user->cidade)" wire:model.lazy='cidade' autofocus autocomplete="cidade" />
                        <x-input-error class="mt-2" :messages="$errors->get('cidade')" />
                    </div>
                    <div class="bg-purple-100 p-4 rounded-md dark:bg-purple-500">
                        <x-input-label for="estado" :value="__('Estado')" />
                        <x-text-input id="estado" name="estado" type="text" class=" block w-full" :value="old('estado', $user->estado)" wire:model.lazy='estado' autofocus autocomplete="estado" />
                        <x-input-error class="mt-2" :messages="$errors->get('estado')" />
                    </div>
                </div>
            </div>
            <div class="pt-2">
                <div class="bg-purple-100 p-4 rounded-md dark:bg-purple-500">
                    <x-input-label for="profissao" :value="__('Profissão *')" />
                    <x-text-input id="profissao" name="profissao" type="text" class=" block w-full" :value="old('profissao', $user->profissao)" wire:model.lazy='profissao' required autofocus autocomplete="profissao" />
                    <x-input-error class="mt-2" :messages="$errors->get('profissao')" />
                </div>
            </div>
        </div>
        <div class="mt-4">
            <x-primary-button class="w-fit place-self-end sm:place-self-center" type="submit">{{ __('Salvar') }}</x-primary-button>
            <x-primary-button type='reset' class="w-fit sm:place-self-center">{{ __('Cancelar') }}</x-primary-button>
        </div>
    </form>
</section>