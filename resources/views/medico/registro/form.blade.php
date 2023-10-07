<section>

    @if($user->role == "user")
        <form method="post" action="{{ url('medico-store')}}" class="mt-6 space-y-6">
            {{ csrf_field() }}

            <div>
                <x-input-label for="nome" :value="__('Nome')" />
                <x-text-input id="nome" name="nome" type="text" class="mt-1 block w-full" required autofocus autocomplete="nome" 
                />
                <x-input-error class="mt-2" :messages="$errors->get('nome')" />
            </div>

            <div>
                <x-input-label for="sobrenome" :value="__('Sobrenome')" />
                <x-text-input id="sobrenome" name="sobrenome" type="text" class="mt-1 block w-full" required autofocus autocomplete="sobrenome" 
                />
                <x-input-error class="mt-2" :messages="$errors->get('nome')" />
            </div>

            <div>
                <x-input-label for="sobrenome" :value="__('Sobrenome')" />
                <x-text-input id="sobrenome" name="sobrenome" type="text" class="mt-1 block w-full" required autofocus autocomplete="sobrenome" 
                />
                <x-input-error class="mt-2" :messages="$errors->get('sobrenome')" />
            </div>

            <div>
                <x-input-label for="cpf" :value="__('CPF')" />
                <x-text-input id="cpf" name="cpf" type="number" class="mt-1 block w-full" required autofocus autocomplete="cpf" 
                />
                <x-input-error class="mt-2" :messages="$errors->get('cpf')" />
            </div>

            <div>
                <x-input-label for="rg" :value="__('RG')" />
                <x-text-input id="rg" name="rg" type="number" class="mt-1 block w-full" required autofocus autocomplete="rg" 
                />
                <x-input-error class="mt-2" :messages="$errors->get('rg')" />
            </div>

            <div>
                <x-input-label for="dataNasc" :value="__('Data de nascimento')" />
                <x-text-input id="dataNasc" name="dataNasc" type="date" class="mt-1 block w-full" required autofocus autocomplete="dataNasc" 
                />
                <x-input-error class="mt-2" :messages="$errors->get('dataNasc')" />
            </div>

            <div>
                <x-input-label for="fone" :value="__('Fone')" />
                <x-text-input id="fone" name="fone" type="number" class="mt-1 block w-full" required autofocus autocomplete="fone" 
                />
                <x-input-error class="mt-2" :messages="$errors->get('fone')" />
            </div>

            <div>
                <x-input-label for="crm" :value="__('Crm')" />
                <x-text-input id="crm" name="crm" type="number" class="mt-1 block w-full" required autofocus autocomplete="crm" 
                />
                <x-input-error class="mt-2" :messages="$errors->get('crm')" />
            </div>

            <div>
                <x-input-label for="especialidade" :value="__('Especialidade')" />
                <x-text-input id="especialidade" name="especialidade" type="text" class="mt-1 block w-full" required autofocus autocomplete="especialidade" 
                />
                <x-input-error class="mt-2" :messages="$errors->get('especialidade')" />
            </div>

            <!-- Colocar como select input -->
            <!-- Valores: Solteiro, Casado, Separado, Divorciado, Viuvo -->
            <div>
                <x-input-label for="estadoCivil" :value="__('Estado Civil')" />
                <x-text-input id="estadoCivil" name="estadoCivil" type="text" class="mt-1 block w-full" required autofocus autocomplete="estadoCivil" 
                />
                <x-input-error class="mt-2" :messages="$errors->get('estadoCivil')" />
            </div>

            <!-- Colocar como select input (Masc ou Fem-->
            <div>
                <x-input-label for="sexo" :value="__('Sexo')" />
                <x-text-input id="sexo" name="sexo" type="text" class="mt-1 block w-full" required autofocus autocomplete="sexo" 
                />
                <x-input-error class="mt-2" :messages="$errors->get('sexo')" />
            </div>

            <!-- Area endereco -->
            <div>
                <x-input-label for="cep" :value="__('CEP')" />
                <x-text-input id="cep" name="cep" type="number" class="mt-1 block w-full" required autofocus autocomplete="cep" 
                />
                <x-input-error class="mt-2" :messages="$errors->get('cep')" />
            </div>

            <div>
                <x-input-label for="logradouro" :value="__('Logradouro')" />
                <x-text-input id="logradouro" name="logradouro" type="text" class="mt-1 block w-full" required autofocus autocomplete="logradouro"
                />
                <x-input-error class="mt-2" :messages="$errors->get('logradouro')" />
            </div>

            <div>
                <x-input-label for="numero" :value="__('Numero')" />
                <x-text-input id="numero" name="numero" type="text" class="mt-1 block w-full" required autofocus autocomplete="numero"
                />
                <x-input-error class="mt-2" :messages="$errors->get('numero')" />
            </div>

            <div>
                <x-input-label for="complemento" :value="__('Complemento')" />
                <x-text-input id="complemento" name="complemento" type="text" class="mt-1 block w-full" required autofocus autocomplete="complemento"
                />
                <x-input-error class="mt-2" :messages="$errors->get('complemento')" />
            </div>

            <div>
                <x-input-label for="bairro" :value="__('Bairro')" />
                <x-text-input id="bairro" name="bairro" type="text" class="mt-1 block w-full" required autofocus autocomplete="bairro"
                />
                <x-input-error class="mt-2" :messages="$errors->get('bairro')" />
            </div>

            <div>
                <x-input-label for="cidade" :value="__('Cidade')" />
                <x-text-input id="cidade" name="cidade" type="text" class="mt-1 block w-full" required autofocus autocomplete="cidade"
                />
                <x-input-error class="mt-2" :messages="$errors->get('cidade')" />
            </div>

            <div>
                <x-input-label for="estado" :value="__('Estadp')" />
                <x-text-input id="estado" name="estado" type="text" class="mt-1 block w-full" required autofocus autocomplete="estado"
                />
                <x-input-error class="mt-2" :messages="$errors->get('estado')" />
            </div>


            <div>
                <x-primary-button type="submit">{{ __('Salvar') }}</x-primary-button>
                <x-primary-button wire:click='resetInputFields'>{{ __('Cancelar') }}</x-primary-button>
            </div>

        </form>
    @elseif($user->role == "medico")

</section>