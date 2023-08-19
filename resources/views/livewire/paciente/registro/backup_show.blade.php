{{-- Success is as dangerous as failure. --}}
<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Informações') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form action="{{ route('profile.update') }}" method="POST" class="mt-6 space-y-6">
        @csrf
        @method('patch')
            <!-- inicio form input-->
                {{-- Success is as dangerous as failure. --}}
                {{-- In work, do what you enjoy. --}}
                        <div>
                            <x-input-label for="name" :value="__('Nome')" />
                            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" required autofocus autocomplete="name" />
                            <x-input-error class="mt-2" :messages="$errors->get('name')" />
                        </div>
                        <!-- <div class="form-group mt-3">
                            <label for="nome">Nome completo</label>
                            <input type="text" class="form-control" id="nome" aria-describedby="nombreHelp" placeholder="Digite seu nome"
                            wire:model.lazy='nome' name="nome">
                            @error('nome') <span class="text-danger">{{ $message }}</span> @enderror
                        </div> -->

                        <div>
                            <x-input-label for="cpf" :value="__('CPF')" />
                            <x-text-input id="cpf" name="cpf" type="text" class="mt-1 block w-full" wire:model.lazy='cpf' />
                            <x-input-error class="mt-2" :messages="$errors->get('cpf')" />
                        </div>
                        <!-- <div class="form-group mt-3">
                            <label for="cpf">CPF:</label>
                            <input type="number" class="form-control" id="cpf" aria-describedby="cpfHelp" placeholder="Digite seu cpf"
                            wire:model.lazy='cpf' name="cpf" >
                            @error('cpf') <span class="text-danger">{{ $message }}</span> @enderror 
                        </div> -->

                        <div>
                            <x-input-label for="rg" :value="__('RG')" />
                            <x-text-input id="rg" name="rg" type="text" class="mt-1 block w-full" wire:model.lazy='rg' />
                            <x-input-error class="mt-2" :messages="$errors->get('rg')" />
                        </div>
                        <!-- <div class="form-group mt-3">
                            <label for="rg">RG:</label>
                            <input type="number" class="form-control" id="rg" aria-describedby="rgHelp" placeholder="Digite seu rg"
                            wire:model.lazy='rg' name="rg">
                            @error('rg') <span class="text-danger">{{ $message }}</span> @enderror
                        </div> -->
                
                        <div>
                            <x-input-label for="data_nasc" :value="__('Data de nascimento')" />
                            <x-text-input id="data_nasc" name="data_nasc" type="date" class="mt-1 block w-full" wire:model.lazy='data_nasc' />
                            <x-input-error class="mt-2" :messages="$errors->get('data_nasc')" />
                        </div>
                        <!-- <div class="form-group mt-3">
                            <label for="data_nascimento">Data de nascimento:</label>
                            <input type="date" class="form-control" id="data_nasc" aria-describedby="data_nascimentoHelp" placeholder="Digite sua data de nascimento"
                            wire:model.lazy='data_nasc' name="data_nasc">
                            @error('data_nasc') <span class="text-danger">{{ $message }}</span> @enderror
                        </div> -->

                        <!-- Inicio endereco -->

                            <div>
                                <x-input-label for="cep" :value="__('CEP')" />
                                <x-text-input id="cep" name="cep" type="text" class="mt-1 block w-full" wire:model.lazy='cep' />
                                <x-input-error class="mt-2" :messages="$errors->get('cep')" />
                            </div>
                            <!-- <div class="form-group mt-3">
                                <label for="cep">Cep:</label>
                                <input type="number" class="form-control" id="cep" aria-describedby="cepHelp" placeholder="Digite seu cep"
                                wire:model.lazy='cep' name="cep">
                                @error('cep') <span class="text-danger">{{ $message }}</span> @enderror
                            </div> -->

                            <div>
                                <x-input-label for="logradouro" :value="__('Logradouro')" />
                                <x-text-input id="logradouro" name="logradouro" type="text" class="mt-1 block w-full" wire:model.lazy='logradouro' />
                                <x-input-error class="mt-2" :messages="$errors->get('logradouro')" />
                            </div>
                            <!-- <div class="form-group mt-3">
                                <label for="logradouro">Logradouro:</label>
                                <input type="text" class="form-control" id="logradouro" aria-describedby="logradouroHelp" placeholder="Digite seu endereço"
                                wire:model.lazy='logradouro' name="logradouro">
                                @error('logradouro') <span class="text-danger">{{ $message }}</span> @enderror
                            </div> -->

                            <div>
                                <x-input-label for="numero" :value="__('Número')" />
                                <x-text-input id="numero" name="numero" type="text" class="mt-1 block w-full" wire:model.lazy='numero' />
                                <x-input-error class="mt-2" :messages="$errors->get('numero')" />
                            </div>
                            <!-- <div class="form-group mt-3">
                                <label for="numero">Número:</label>
                                <input type="number" class="form-control" id="numero" aria-describedby="numeroHelp" placeholder="Digite seu numero"
                                wire:model.lazy='numero' name="numero">
                                @error('numero') <span class="text-danger">{{ $message }}</span> @enderror
                            </div> -->

                            <div>
                                <x-input-label for="complemento" :value="__('Complemento')" />
                                <x-text-input id="complemento" name="complemento" type="text" class="mt-1 block w-full" wire:model.lazy='complemento' />
                                <x-input-error class="mt-2" :messages="$errors->get('complemento')" />
                            </div>
                            <!-- <div class="form-group mt-3">
                                <label for="complemento">Complemento:</label>
                                <input type="text" class="form-control" id="complemento" aria-describedby="complementoHelp" placeholder="Digite seu complemento"
                                wire:model.lazy='complemento' name="complemento">
                                @error('complemento') <span class="text-danger">{{ $message }}</span> @enderror
                            </div> -->

                            <div>
                                <x-input-label for="bairro" :value="__('Bairro')" />
                                <x-text-input id="bairro" name="bairro" type="text" class="mt-1 block w-full" wire:model.lazy='bairro' />
                                <x-input-error class="mt-2" :messages="$errors->get('bairro')" />
                            </div>
                            <!-- <div class="form-group mt-3">
                                <label for="bairro">Bairro:</label>
                                <input type="text" class="form-control" id="bairro" aria-describedby="bairroHelp" placeholder="Digite seu bairro"
                                wire:model.lazy='bairro' name="bairro">
                                @error('bairro') <span class="text-danger">{{ $message }}</span> @enderror
                            </div> -->

                            <div>
                                <x-input-label for="cidade" :value="__('Cidade')" />
                                <x-text-input id="cidade" name="cidade" type="text" class="mt-1 block w-full" wire:model.lazy='cidade' />
                                <x-input-error class="mt-2" :messages="$errors->get('cidade')" />
                            </div>
                            <!-- <div class="form-group mt-3">
                                <label for="cidade">Cidade:</label>
                                <input type="text" class="form-control" id="cidade" aria-describedby="cidadeHelp" placeholder="Digite sua cidade"
                                wire:model.lazy='cidade' name="cidade">
                                @error('cidade') <span class="text-danger">{{ $message }}</span> @enderror
                            </div> -->

                            <div>
                                <x-input-label for="estado" :value="__('Estado')" />
                                <x-text-input id="estado" name="estado" type="text" class="mt-1 block w-full" wire:model.lazy='estado' />
                                <x-input-error class="mt-2" :messages="$errors->get('estado')" />
                            </div>
                            <!-- <div class="form-group mt-3">
                                <label for="estado">Estado:</label>
                                <input type="text" class="form-control" id="estado" aria-describedby="estadoHelp" placeholder="Digite seu estado"
                                wire:model.lazy='estado' name="estado">
                                @error('estado') <span class="text-danger">{{ $message }}</span> @enderror
                            </div> -->

                        <!-- fim endereco -->

                        <div>
                            <x-input-label for="telefone" :value="__('Telefone')" />
                            <x-text-input id="telefone" name="telefone" type="text" class="mt-1 block w-full" wire:model.lazy='telefone' />
                            <x-input-error class="mt-2" :messages="$errors->get('telefone')" />
                        </div>
                        <!-- <div class="form-group mt-3">
                            <label for="telefone">Telefone:</label>
                            <input type="number" class="form-control" id="telefone" aria-describedby="telefoneHelp" placeholder="Digite seu telefone"
                            wire:model.lazy='telefone' name="telefone">
                            @error('telefone') <span class="text-danger">{{ $message }}</span> @enderror
                        </div> -->

                        <div>
                            <x-input-label for="plano_saude" :value="__('Plano de saúde')" />
                            <x-text-input id="plano_saude" name="plano_saude" type="text" class="mt-1 block w-full" wire:model.lazy='plano_saude' />
                            <x-input-error class="mt-2" :messages="$errors->get('plano_saude')" />
                        </div>
                        <!-- <div class="form-group mt-3">
                            <label for="plano_saude">Plano de saúde:</label>
                            <input type="text" class="form-control" id="plano_saude" aria-describedby="plano_saudeHelp" placeholder="Digite seu plano de saúde"
                            wire:model.lazy='plano_saude' name="plano_saude" >
                            @error('plano_saude') <span class="text-danger">{{ $message }}</span> @enderror
                        </div> -->

                        <div>
                            <x-input-label for="sexo" :value="__('Sexo')" />
                            <div class="flex items-center gap-2">
                                <x-text-input id="masculino" name="sexo" type="radio" value="masculino" />
                                <x-input-label for="masculino" :value="__('Masculino')" />
                            </div>
                            <div class="flex items-center gap-2">
                                <x-text-input id="feminino" name="sexo" type="radio" value="feminino" />
                                <x-input-label for="feminino" :value="__('Feminino')" />
                            </div>
                            <div class="flex items-center gap-2">
                                <x-text-input id="outro" name="sexo" type="radio" value="outro" checked/>
                                <x-input-label for="outro" :value="__('Outro')" />
                            </div>
                            <x-input-error class="mt-2" :messages="$errors->get('sexo')" />
                        </div>
                        <!-- <div class="form-group mt-3">
                            <label for="sexo">Sexo:</label>
                            <input type="text"  class="form-control" id="sexo" aria-describedby="sexoHelp" placeholder="Digite seu sexo"
                            wire:model.lazy='sexo' name="sexo">
                            @error('sexo') <span class="text-danger">{{ $message }}</span> @enderror
                        </div> -->

                        
            <!-- fim form input-->

        <div class="flex items-center gap-4">
            <x-primary-button type="submit">{{ __('Salvar') }}</x-primary-button>
            <x-primary-button wire:click='resetInputFields'>{{ __('Cancelar') }}</x-primary-button>
            <!-- <button type="submit" class="btn btn-primary mt-3">Salvar</button>
            <button type="button" wire:click='resetInputFields' class="btn btn-secondary mt-3">Cancelar</button> -->
        </div>
        
    </form>
</section>