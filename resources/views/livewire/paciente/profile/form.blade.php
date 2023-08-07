<div>
    {{-- The Master doesn't talk, he acts. --}}
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Informações') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>
    <form wire:submit.prevent='submit' method="POST" class="mt-6 space-y-6">
        @csrf
        <div class="mt-11">
        </div>
            <!-- inicio form input-->
            <div>
                {{-- Success is as dangerous as failure. --}}
                {{-- In work, do what you enjoy. --}}
                <div class="mt-11">
                        <div>
                            <x-input-label for="nome" :value="__('Nome')" />
                            <x-text-input id="nome" name="nome" type="text" class="mt-1 block w-full" wire:model.lazy='nome' />
                            <x-input-error class="mt-2" :messages="$errors->get('nome')" />
                        </div>

                        <div>
                            <x-input-label for="sobrenome" :value="__('Nome')" />
                            <x-text-input id="sobrenome" name="sobrenome" type="text" class="mt-1 block w-full" wire:model.lazy='sobrenome' />
                            <x-input-error class="mt-2" :messages="$errors->get('sobrenome')" />
                        </div>

                        <div>
                            <x-input-label for="cpf" :value="__('CPF')" />
                            <x-text-input id="cpf" name="cpf" type="text" class="mt-1 block w-full" wire:model.lazy='cpf' />
                            <x-input-error class="mt-2" :messages="$errors->get('cpf')" />
                        </div>

                        <div>
                            <x-input-label for="rg" :value="__('RG')" />
                            <x-text-input id="rg" name="rg" type="text" class="mt-1 block w-full" wire:model.lazy='rg' />
                            <x-input-error class="mt-2" :messages="$errors->get('rg')" />
                        </div>
                
                        <div>
                            <x-input-label for="dataNasc" :value="__('Data de nascimento')" />
                            <x-text-input id="dataNasc" name="dataNasc" type="date" class="mt-1 block w-full" wire:model.lazy='dataNasc' />
                            <x-input-error class="mt-2" :messages="$errors->get('dataNasc')" />
                        </div>

                        <div>
                            <!-- Opcoes: Solteiro, Casado, Separado, Divorciado, Viuvo -->

                            <x-input-label for="estadoCivil" :value="__('Estado Civil')" />
                            <x-text-input id="estadoCivil" name="estadoCivil" type="text" class="mt-1 block w-full" wire:model.lazy='estadoCivil' />
                            <x-input-error class="mt-2" :messages="$errors->get('estadoCivil')" />
                        </div>

                        <div>
                            <x-input-label for="profissao" :value="__('Profissão')" />
                            <x-text-input id="profissao" name="profissao" type="text" class="mt-1 block w-full" wire:model.lazy='profissao' />
                            <x-input-error class="mt-2" :messages="$errors->get('profissao')" />
                        </div>

                        <div>
                            <x-input-label for="fone" :value="__('Telefone')" />
                            <x-text-input id="fone" name="fone" type="number" class="mt-1 block w-full" wire:model.lazy='fone' />
                            <x-input-error class="mt-2" :messages="$errors->get('fone')" />
                        </div>

                        <div>
                            <!-- Opcoes: Masc, Fem -->
                            <x-input-label for="sexo" :value="__('Sexo')" />
                            <x-text-input id="sexo" name="sexo" type="text" class="mt-1 block w-full" wire:model.lazy='sexo' />
                            <x-input-error class="mt-2" :messages="$errors->get('sexo')" />
                        </div>

                    </div> 
            </div>
                        
            <!-- fim form input-->

        <div class="flex items-center gap-4">
            <x-primary-button type="submit">{{ __('Salvar') }}</x-primary-button>
            <x-primary-button wire:click='resetInputFields'>{{ __('Cancelar') }}</x-primary-button>
        </div>
        
    </form>
</div>
