<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Cadastro médico') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form wire:submit.prevent='submit' method="post" class="mt-6 space-y-6">
        @csrf

        <div>
            <x-input-label for="nome" :value="__('Nome')" />
            <x-text-input id="nome" name="nome" type="text" class="mt-1 block w-full" required autofocus autocomplete="nome" 
            wire:model.lazy='nome' />
            <x-input-error class="mt-2" :messages="$errors->get('nome')" />
        </div>

        <div>
            <x-input-label for="cpf" :value="__('CPF')" />
            <x-text-input id="cpf" name="cpf" type="number" class="mt-1 block w-full" required autofocus autocomplete="cpf" 
            wire:model.lazy='cpf' />
            <x-input-error class="mt-2" :messages="$errors->get('cpf')" />
        </div>

        <div>
            <x-input-label for="rg" :value="__('RG')" />
            <x-text-input id="rg" name="rg" type="number" class="mt-1 block w-full" required autofocus autocomplete="rg" 
            wire:model.lazy='rg' />
            <x-input-error class="mt-2" :messages="$errors->get('rg')" />
        </div>

        <div>
            <x-input-label for="data_nasc" :value="__('Data de nascimento')" />
            <x-text-input id="data_nasc" name="data_nasc" type="date" class="mt-1 block w-full" required autofocus autocomplete="data_nasc" 
            wire:model.lazy='data_nasc' />
            <x-input-error class="mt-2" :messages="$errors->get('data_nasc')" />
        </div>

        <div>
            <x-input-label for="telefone" :value="__('Telefone')" />
            <x-text-input id="telefone" name="telefone" type="number" class="mt-1 block w-full" required autofocus autocomplete="telefone" 
            wire:model.lazy='telefone' />
            <x-input-error class="mt-2" :messages="$errors->get('telefone')" />
        </div>

        <div>
            <x-input-label for="crm" :value="__('Crm')" />
            <x-text-input id="crm" name="crm" type="number" class="mt-1 block w-full" required autofocus autocomplete="crm" 
            wire:model.lazy='crm' />
            <x-input-error class="mt-2" :messages="$errors->get('crm')" />
        </div>

        <div>
            <x-input-label for="especialidade" :value="__('Especialidade')" />
            <x-text-input id="especialidade" name="especialidade" type="text" class="mt-1 block w-full" required autofocus autocomplete="especialidade" 
            wire:model.lazy='especialidade' />
            <x-input-error class="mt-2" :messages="$errors->get('especialidade')" />
        </div>

        <!-- Colocar como select input -->
        <div>
            <x-input-label for="sexo" :value="__('Sexo')" />
            <x-text-input id="sexo" name="sexo" type="text" class="mt-1 block w-full" required autofocus autocomplete="sexo" 
            wire:model.lazy='sexo' />
            <x-input-error class="mt-2" :messages="$errors->get('sexo')" />
        </div>
        <div>
            <x-primary-button type="submit">{{ __('Salvar') }}</x-primary-button>
            <x-primary-button wire:click='resetInputFields'>{{ __('Cancelar') }}</x-primary-button>
        </div>
    </form>
</section>