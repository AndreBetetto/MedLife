{{-- Success is as dangerous as failure. --}}
<section>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form wire:submit.prevent='submit' action="{{ route('profile.update') }}" method="POST" class="mt-6 grid grid-cols-2 gap-6">
        @csrf
        @method('patch')

            <h2 class="col-span-2 text-lg text-center font-medium m-0 gap-0">Informações pessoais</h2>
        
            <!-- inicio form input-->
            <div class="">
                <x-input-label for="name" :value="__('Nome')" />
                <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" wire:model.lazy='nome' required autofocus autocomplete="name" />
                <x-input-error class="mt-2" :messages="$errors->get('name')" />
            </div>

            <div class="">
                <x-input-label for="data_nasc" :value="__('Data de nascimento')" />
                <x-text-input id="data_nasc" name="data_nasc" type="date" class="mt-1 block w-full" wire:model.lazy='data_nasc' required autofocus autocomplete="data_nasc" />
                <x-input-error class="mt-2" :messages="$errors->get('data_nasc')" />
            </div>

            <div class="">
                <x-input-label for="cpf" :value="__('CPF')" />
                <x-text-input id="cpf" name="cpf" type="text" class="mt-1 block w-full" wire:model.lazy='cpf' required autofocus autocomplete="cpf" />
                <x-input-error class="mt-2" :messages="$errors->get('cpf')" />
            </div>

            <div class="">
                <x-input-label for="rg" :value="__('RG')" />
                <x-text-input id="rg" name="rg" type="text" class="mt-1 block w-full" wire:model.lazy='rg' required autofocus autocomplete="rg" />
                <x-input-error class="mt-2" :messages="$errors->get('rg')" />
            </div>
            
            <div class="">
                <x-input-label for="sexo" :value="__('Sexo')" />
                <x-text-input id="sexo" name="sexo" type="text" class="mt-1 block w-full" wire:model.lazy='sexo' required autofocus autocomplete="sexo" />
                <x-input-error class="mt-2" :messages="$errors->get('sexo')" />
            </div>

            <div class="">
                <x-input-label for="telefone" :value="__('Telefone')" />
                <x-text-input id="telefone" name="telefone" type="text" class="mt-1 block w-full" wire:model.lazy='telefone' required autofocus autocomplete="telefone" />
                <x-input-error class="mt-2" :messages="$errors->get('telefone')" />
            </div>

            <!-- Inicio endereco -->           
            <div class="">
                <x-input-label for="cep" :value="__('CEP')" />
                <x-text-input id="cep" name="cep" type="text" class="mt-1 block w-full" wire:model.lazy='cep' required autofocus autocomplete="cep" />
                <x-input-error class="mt-2" :messages="$errors->get('cep')" />
            </div>

            <div class="">
                <x-input-label for="logradouro" :value="__('Logradouro')" />
                <x-text-input id="logradouro" name="logradouro" type="text" class="mt-1 block w-full" wire:model.lazy='logradouro' required autofocus autocomplete="logradouro" />
                <x-input-error class="mt-2" :messages="$errors->get('logradouro')" />
            </div>

            <div class="">
                <x-input-label for="numero" :value="__('Número')" />
                <x-text-input id="numero" name="numero" type="text" class="mt-1 block w-full" wire:model.lazy='numero' required autofocus autocomplete="numero" />
                <x-input-error class="mt-2" :messages="$errors->get('numero')" />
            </div>

            <div class="">
                <x-input-label for="complemento" :value="__('Complemento')" />
                <x-text-input id="complemento" name="complemento" type="text" class="mt-1 block w-full" wire:model.lazy='complemento' required autofocus autocomplete="complemento" />
                <x-input-error class="mt-2" :messages="$errors->get('complemento')" />
            </div>

            <div class="">
                <x-input-label for="bairro" :value="__('Bairro')" />
                <x-text-input id="bairro" name="bairro" type="text" class="mt-1 block w-full" wire:model.lazy='bairro' required autofocus autocomplete="bairro" />
                <x-input-error class="mt-2" :messages="$errors->get('bairro')" />
            </div>

            <div class="">
                <x-input-label for="cidade" :value="__('Cidade')" />
                <x-text-input id="cidade" name="cidade" type="text" class="mt-1 block w-full" wire:model.lazy='cidade' required autofocus autocomplete="cidade" />
                <x-input-error class="mt-2" :messages="$errors->get('cidade')" />
            </div>

            <div class="">
                <x-input-label for="estado" :value="__('Estado')" />
                <x-text-input id="estado" name="estado" type="text" class="mt-1 block w-full" wire:model.lazy='estado' required autofocus autocomplete="estado" />
                <x-input-error class="mt-2" :messages="$errors->get('estado')" />
            </div>

            <!-- fim endereco -->

            <div class="">
                <x-input-label for="plano_saude" :value="__('Plano de saúde')" />
                <x-text-input id="plano_saude" name="plano_saude" type="text" class="mt-1 block w-full" wire:model.lazy='plano_saude' required autofocus autocomplete="plano_saude" />
                <x-input-error class="mt-2" :messages="$errors->get('plano_saude')" />
            </div>

                        
            <!-- fim form input-->

        <div class="col-span-2 flex items-center justify-center gap-4">
            <x-primary-button type="submit">{{ __('Salvar') }}</x-primary-button>
            <x-primary-button wire:click='resetInputFields'>{{ __('Cancelar') }}</x-primary-button>
        </div>
        
    </form>
</section>