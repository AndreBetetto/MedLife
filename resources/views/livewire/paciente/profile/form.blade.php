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

    {{ $user->name }}
    {{ $paciente->profissao }}
    <br>

    {{-- Se usuario n tiver cadastro completo  --}}
    @if($user->role == "user")
        <form action="{{ route('profilepaciente.store') }}" method="POST" enctype="multipart/form-data" class="mt-6 space-y-6">
            @csrf
            <div class="mt-11">
            </div>
                <!-- inicio form input-->
                <div>
                    {{-- Success is as dangerous as failure. --}}
                    {{-- In work, do what you enjoy. --}}
                    <div class="mt-11">
                        <div>
                            <x-text-input id="user_id" name="user_id" type="text" class="mt-1 block w-full" 
                            value=" {{ $user->id }}"/>
                        </div>
                            <div>
                                <x-input-label for="nome" :value="__('Nome')" />
                                <x-text-input id="nome" name="nome" type="text" class="mt-1 block w-full" 
                                />
                                <x-input-error class="mt-2" :messages="$errors->get('nome')" />
                            </div>
                            

                            <div>
                                <x-input-label for="sobrenome" :value="__('Sobrenome')" />
                                <x-text-input id="sobrenome" name="sobrenome" type="text" class="mt-1 block w-full" 
                                />
                                <x-input-error class="mt-2" :messages="$errors->get('sobrenome')" />
                            </div>

                            <div>
                                <x-input-label for="cpf" :value="__('CPF')" />
                                <x-text-input id="cpf" name="cpf" type="number" class="mt-1 block w-full"  />
                                <x-input-error class="mt-2" :messages="$errors->get('cpf')" />
                            </div>

                            <div>
                                <x-input-label for="fone" :value="__('fone')" />
                                <x-text-input id="fone" name="fone" type="number" class="mt-1 block w-full"  />
                                <x-input-error class="mt-2" :messages="$errors->get('fone')" />
                            </div>

                            <div>
                                <x-input-label for="profissao" :value="__('profissao')" />
                                <x-text-input id="profissao" name="profissao" type="text" class="mt-1 block w-full"  />
                                <x-input-error class="mt-2" :messages="$errors->get('profissao')" />
                            </div>

                            

                            <!-- Colocar como select input (Masc ou Fem-->
                            <div>
                                <x-input-label for="sexo" :value="__('Sexo')" />
                                <x-text-input id="sexo" name="sexo" type="text" class="mt-1 block w-full" required autofocus autocomplete="sexo" 
                                />
                                <x-input-error class="mt-2" :messages="$errors->get('sexo')" />
                            </div>

                            <!-- Colocar como select input -->
                            <!-- Valores: Solteiro, Casado, Separado, Divorciado, Viuvo -->
                            <div>
                                <x-input-label for="estadoCivil" :value="__('Estado Civil')" />
                                <x-text-input id="estadoCivil" name="estadoCivil" type="text" class="mt-1 block w-full" required autofocus autocomplete="estadoCivil" 
                                />
                                <x-input-error class="mt-2" :messages="$errors->get('estadoCivil')" />
                            </div>
                            

                            <div>
                                <x-input-label for="rg" :value="__('RG')" />
                                <x-text-input id="rg" name="rg" type="number" class="mt-1 block w-full"  />
                                <x-input-error class="mt-2" :messages="$errors->get('rg')" />
                            </div>
                    
                            <div>
                                <x-input-label for="dataNasc" :value="__('Data de nascimento')" />
                                <x-text-input id="dataNasc" name="dataNasc" type="date" class="mt-1 block w-full" />
                                <x-input-error class="mt-2" :messages="$errors->get('dataNasc')" />
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


                        </div> 
                </div>
                            
                <!-- fim form input-->

            <div class="flex items-center gap-4">
                <x-primary-button type="submit">{{ __('Salvar') }}</x-primary-button>
                <x-primary-button wire:click='resetInputFields'>{{ __('Cancelar') }}</x-primary-button>
            </div>
            
        </form>

    @elseif($user->role == "paciente")
    <form action="{{ route('profilepaciente.update') }}" method="POST" enctype="multipart/form-data" class="mt-6 space-y-6">
        @csrf
        @method('patch')
        <div class="mt-11">
        </div>
            <!-- inicio form input-->
            <div>
                {{-- Success is as dangerous as failure. --}}
                {{-- In work, do what you enjoy. --}}
                <div class="mt-11">
                    <div>
                        <x-text-input id="user_id" name="user_id" type="text" class="mt-1 block w-full" 
                        value=" {{ $user->id }}"/>
                    </div>
                        <div>
                            <x-input-label for="nome" :value="__('Nome')" />
                            <x-text-input id="nome" name="nome" type="text" class="mt-1 block w-full" 
                            value='{{ $paciente->nome }}' />
                            <x-input-error class="mt-2" :messages="$errors->get('nome')" />
                        </div>
                        

                        <div>
                            <x-input-label for="sobrenome" :value="__('Sobrenome')" />
                            <x-text-input id="sobrenome" name="sobrenome" type="text" class="mt-1 block w-full" 
                            value='{{ $paciente->sobrenome }}' />
                            <x-input-error class="mt-2" :messages="$errors->get('sobrenome')" />
                        </div>

                        <div>
                            <x-input-label for="cpf" :value="__('CPF')" />
                            <x-text-input id="cpf" name="cpf" type="number" class="mt-1 block w-full"  
                            value='{{ $paciente->cpf }}' />
                            <x-input-error class="mt-2" :messages="$errors->get('cpf')" />
                        </div>

                        <div>
                            <x-input-label for="fone" :value="__('fone')" />
                            <x-text-input id="fone" name="fone" type="number" class="mt-1 block w-full" 
                            value='{{ $paciente->fone }}' />
                            <x-input-error class="mt-2" :messages="$errors->get('fone')" />
                        </div>

                        <div>
                            <x-input-label for="profissao" :value="__('profissao')" />
                            <x-text-input id="profissao" name="profissao" type="text" class="mt-1 block w-full" 
                            value='{{ $paciente->profissao }}' />
                            <x-input-error class="mt-2" :messages="$errors->get('profissao')" />
                        </div>

                        

                        <!-- Colocar como select input (Masc ou Fem-->
                        <div>
                            <x-input-label for="sexo" :value="__('Sexo')" />
                            <x-text-input id="sexo" name="sexo" type="text" class="mt-1 block w-full" required autofocus autocomplete="sexo" 
                            value='{{ $paciente->sexo }}' />
                            <x-input-error class="mt-2" :messages="$errors->get('sexo')" />
                        </div>

                        <!-- Colocar como select input -->
                        <!-- Valores: Solteiro, Casado, Separado, Divorciado, Viuvo -->
                        <div>
                            <x-input-label for="estadoCivil" :value="__('Estado Civil')" />
                            <x-text-input id="estadoCivil" name="estadoCivil" type="text" class="mt-1 block w-full" required autofocus autocomplete="estadoCivil" 
                            value='{{ $paciente->estadoCivil }}' />
                            <x-input-error class="mt-2" :messages="$errors->get('estadoCivil')" />
                        </div>
                        

                        <div>
                            <x-input-label for="rg" :value="__('RG')" />
                            <x-text-input id="rg" name="rg" type="number" class="mt-1 block w-full"  
                            value='{{ $paciente->rg }}' />
                            <x-input-error class="mt-2" :messages="$errors->get('rg')" />
                        </div>
                
                        <div>
                            <x-input-label for="dataNasc" :value="__('Data de nascimento')" />
                            <x-text-input id="dataNasc" name="dataNasc" type="date" class="mt-1 block w-full" 
                            value='{{ $paciente->dataNasc }}' />
                            <x-input-error class="mt-2" :messages="$errors->get('dataNasc')" />
                        </div>
                    </div> 
            </div>
                        
            <!-- fim form input-->

        <div class="flex items-center gap-4">
            <x-primary-button type="submit">{{ __('Salvar') }}</x-primary-button>
            <x-primary-button wire:click='resetInputFields'>{{ __('Cancelar') }}</x-primary-button>
        </div>
        
    </form>
        
    @elseif($user->role == "medico")
        
    @endif




</div>