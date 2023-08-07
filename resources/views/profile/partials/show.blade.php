{{-- Success is as dangerous as failure. --}}
<div>
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
                            <x-input-label for="name" :value="__('Nome')" />
                            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" wire:model.lazy='nome' />
                            <x-input-error class="mt-2" :messages="$errors->get('name')" />
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
                            <x-input-label for="data_nasc" :value="__('Data de nascimento')" />
                            <x-text-input id="data_nasc" name="data_nasc" type="date" class="mt-1 block w-full" wire:model.lazy='data_nasc' />
                            <x-input-error class="mt-2" :messages="$errors->get('data_nasc')" />
                        </div>

                        <!-- Inicio endereco -->

                        <div>
                            <div>
                                <x-input-label for="cep" :value="__('CEP')" />
                                <x-text-input id="cep" name="cep" type="text" class="mt-1 block w-full" wire:model.lazy='cep' />
                                <x-input-error class="mt-2" :messages="$errors->get('cep')" />
                            </div>

                            <div>
                                <x-input-label for="logradouro" :value="__('Logradouro')" />
                                <x-text-input id="logradouro" name="logradouro" type="text" class="mt-1 block w-full" wire:model.lazy='logradouro' />
                                <x-input-error class="mt-2" :messages="$errors->get('logradouro')" />
                            </div>

                            <div>
                                <x-input-label for="numero" :value="__('Número')" />
                                <x-text-input id="numero" name="numero" type="text" class="mt-1 block w-full" wire:model.lazy='numero' />
                                <x-input-error class="mt-2" :messages="$errors->get('numero')" />
                            </div>

                            <div>
                                <x-input-label for="complemento" :value="__('Complemento')" />
                                <x-text-input id="complemento" name="complemento" type="text" class="mt-1 block w-full" wire:model.lazy='complemento' />
                                <x-input-error class="mt-2" :messages="$errors->get('complemento')" />
                            </div>

                            <div>
                                <x-input-label for="bairro" :value="__('Bairro')" />
                                <x-text-input id="bairro" name="bairro" type="text" class="mt-1 block w-full" wire:model.lazy='bairro' />
                                <x-input-error class="mt-2" :messages="$errors->get('bairro')" />
                            </div>

                            <div>
                                <x-input-label for="cidade" :value="__('Cidade')" />
                                <x-text-input id="cidade" name="cidade" type="text" class="mt-1 block w-full" wire:model.lazy='cidade' />
                                <x-input-error class="mt-2" :messages="$errors->get('cidade')" />
                            </div>

                            <div>
                                <x-input-label for="estado" :value="__('Estado')" />
                                <x-text-input id="estado" name="estado" type="text" class="mt-1 block w-full" wire:model.lazy='estado' />
                                <x-input-error class="mt-2" :messages="$errors->get('estado')" />
                            </div>

                        </div>

                        <!-- fim endereco -->

                        <div>
                            <x-input-label for="telefone" :value="__('Telefone')" />
                            <x-text-input id="telefone" name="telefone" type="text" class="mt-1 block w-full" wire:model.lazy='telefone' />
                            <x-input-error class="mt-2" :messages="$errors->get('telefone')" />
                        </div>

                        <div>
                            <x-input-label for="plano_saude" :value="__('Plano de saúde')" />
                            <x-text-input id="plano_saude" name="plano_saude" type="text" class="mt-1 block w-full" wire:model.lazy='plano_saude' />
                            <x-input-error class="mt-2" :messages="$errors->get('plano_saude')" />
                        </div>

                        <div>
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