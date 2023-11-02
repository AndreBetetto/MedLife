{{-- Success is as dangerous as failure. --}}
<section class="">

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form wire:submit.prevent='submit' action="{{ route('profilepaciente.update') }}" method="POST">
        @csrf
        @method('patch')

        <h2 class="col-span-2 text-xl text-center font-medium m-0 gap-0">Informações pessoais</h2>
        <div class="grid gap-2">
            <div class="grid grid-cols-2 gap-4 mt-6">
                <div class="grid gap-4">
                    <div class="bg-purple-100 p-4 rounded-md dark:bg-purple-500">
                        <x-input-label class="" for="name" :value="__('Nome')" />
                        <x-text-input class="" id="name" name="name" type="text" class="block w-full" value="{{ $paciente->nome }}" wire:model.lazy='nome' required autofocus autocomplete="name" />
                        <x-input-error class="" :messages="$errors->get('name')" />
                    </div>
                    <div class="bg-purple-100 p-4 rounded-md dark:bg-purple-500">
                        <x-input-label for="data_nasc" :value="__('Data de nascimento')" />
                        <x-text-input id="data_nasc" name="data_nasc" type="date" class=" block w-full" value="{{ $paciente->dataNasc }}" wire:model.lazy='data_nasc' required autofocus autocomplete="data_nasc" />
                        <x-input-error class="mt-2" :messages="$errors->get('data_nasc')" />
                    </div>
                    <div class="bg-purple-100 p-4 rounded-md dark:bg-purple-500">
                        <x-input-label for="cpf" :value="__('CPF')" />
                        <x-text-input id="cpf" name="cpf" x-mask="999.999.999-99" type="text" class=" block w-full" value="{{ $paciente->cpf }}" wire:model.lazy='cpf' required autofocus autocomplete="cpf" />
                        <x-input-error class="mt-2" :messages="$errors->get('cpf')" />
                    </div>
                    <div class="bg-purple-100 p-4 rounded-md dark:bg-purple-500">
                        <x-input-label for="rg" :value="__('RG')" />
                        <x-text-input id="rg" name="rg" x-mask="99.999.999-9" type="text" class=" block w-full" value="{{ $paciente->rg }}" wire:model.lazy='rg' required autofocus autocomplete="rg" />
                        <x-input-error class="mt-2" :messages="$errors->get('rg')" />
                    </div>
                    <div class="bg-purple-100 p-4 rounded-md dark:bg-purple-500">
                        <x-input-label for="sexo" :value="__('Sexo')" />
                        @php
                            if( $paciente->sexo)
                            {
                                if($paciente->sexo == 'Masc')
                                {
                                    $paciente->sexo = 'Masculino';
                                }
                                else
                                {
                                    $paciente->sexo = 'Feminino';
                                }
                            }
                        @endphp
                        <x-text-input id="sexo" name="sexo" type="text" class=" block w-full" value="{{ $paciente->sexo }}" wire:model.lazy='sexo' required autofocus autocomplete="sexo" />
                        <x-input-error class="mt-2" :messages="$errors->get('sexo')" />
                    </div>
                    <div class="bg-purple-100 p-4 rounded-md dark:bg-purple-500">
                        <x-input-label for="telefone" :value="__('Telefone')" />
                        <x-text-input id="telefone" name="telefone" x-mask="(99) 99999-9999" type="text" class=" block w-full" value="{{ $paciente->fone }}" wire:model.lazy='telefone' required autofocus autocomplete="telefone" />
                        <x-input-error class="mt-2" :messages="$errors->get('telefone')" />
                    </div>
                    <div class="bg-purple-100 p-4 rounded-md dark:bg-purple-500">
                        <x-input-label for="profissao" :value="__('Profissão')" />
                        <x-text-input id="profissao" name="profissao" x-mask="" type="text" class=" block w-full" value="{{ $paciente->profissao }}" wire:model.lazy='telefone' required autofocus autocomplete="telefone" />
                        <x-input-error class="mt-2" :messages="$errors->get('telefone')" />
                    </div>
                </div>
                <div class="grid gap-4">   
                    <div class="bg-purple-100 p-4 rounded-md dark:bg-purple-500">
                        <x-input-label for="estadoCivil" :value="__('Estado Civil')" />
                        <x-text-input id="estadoCivil" name="estadoCivil" type="text" class=" block w-full" value="{{ $paciente->estadoCivil }}" wire:model.lazy='estadoCivil' required autofocus autocomplete="estadoCivil" />
                        <x-input-error class="mt-2" :messages="$errors->get('estadoCivil')" />
                    </div>     
                    <div class="bg-purple-100 p-4 rounded-md dark:bg-purple-500">
                        <x-input-label for="cep" :value="__('CEP')" />
                        <x-text-input id="cep" name="cep" type="text" x-mask="99999-999" class=" block w-full" value="{{ $paciente->cep }}" wire:model.lazy='cep' autofocus autocomplete="cep" />
                        <x-input-error class="mt-2" :messages="$errors->get('cep')" />
                    </div>
                    <div class="bg-purple-100 p-4 rounded-md flex gap-2 dark:bg-purple-500">
                        <div class="w-full">
                            <x-input-label for="logradouro" :value="__('Logradouro')" />
                            <x-text-input id="logradouro" name="logradouro" type="text" class=" block w-full" value="{{ $paciente->logradouro }}" wire:model.lazy='logradouro' autofocus autocomplete="logradouro" />
                            <x-input-error class="mt-2" :messages="$errors->get('logradouro')" />
                        </div>
                        <div>
                            <x-input-label for="numero" :value="__('Número')" />
                            <x-text-input id="numero" name="numero" type="text" x-mask="999" class=" block w-[52px]" value="{{ $paciente->numero }}" wire:model.lazy='numero' autofocus autocomplete="numero" />
                            <x-input-error class="mt-2" :messages="$errors->get('numero')" />
                        </div>
                    </div>
                    <div class="bg-purple-100 p-4 rounded-md dark:bg-purple-500">
                        <x-input-label for="complemento" :value="__('Complemento')" />
                        <x-text-input id="complemento" name="complemento" type="text" class=" block w-full" value="{{ $paciente->complemento }}" wire:model.lazy='complemento' autofocus autocomplete="complemento" />
                        <x-input-error class="mt-2" :messages="$errors->get('complemento')" />
                    </div>
                    <div class="bg-purple-100 p-4 rounded-md dark:bg-purple-500">
                        <x-input-label for="bairro" :value="__('Bairro')" />
                        <x-text-input id="bairro" name="bairro" type="text" class=" block w-full" value="{{ $paciente->bairro }}" wire:model.lazy='bairro' autofocus autocomplete="bairro" />
                        <x-input-error class="mt-2" :messages="$errors->get('bairro')" />
                    </div>
                    <div class="bg-purple-100 p-4 rounded-md dark:bg-purple-500">
                        <x-input-label for="cidade" :value="__('Cidade')" />
                        <x-text-input id="cidade" name="cidade" type="text" class=" block w-full" value="{{ $paciente->cidade }}" wire:model.lazy='cidade' autofocus autocomplete="cidade" />
                        <x-input-error class="mt-2" :messages="$errors->get('cidade')" />
                    </div>
                    <div class="bg-purple-100 p-4 rounded-md dark:bg-purple-500">
                        <x-input-label for="estado" :value="__('Estado')" />
                        <x-text-input id="estado" name="estado" type="text" class=" block w-full" value="{{ $paciente->estado }}" wire:model.lazy='estado' autofocus autocomplete="estado" />
                        <x-input-error class="mt-2" :messages="$errors->get('estado')" />
                    </div>
                    
                </div>
            </div>
            <div class="pt-2">
                <div class="bg-purple-100 p-4 rounded-md dark:bg-purple-500">
                    <x-input-label for="plano_saude" :value="__('Plano de saúde')" />
                    <x-text-input id="plano_saude" name="plano_saude" type="text" class=" block w-full" value="" wire:model.lazy='plano_saude' required autofocus autocomplete="plano_saude" />
                    <x-input-error class="mt-2" :messages="$errors->get('plano_saude')" />
                </div>
            </div>
        </div>
        <div class="mt-4">
            <x-primary-button class="w-fit place-self-end sm:place-self-center" type="submit">{{ __('Salvar') }}</x-primary-button>
            <x-primary-button class="w-fit sm:place-self-center" wire:click='resetInputFields'>{{ __('Cancelar') }}</x-primary-button>
        </div>
    </form>
</section>