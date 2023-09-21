<div>
    <div>
        <x-input-label for="cep" :value="__('CEP')" />
        <x-text-input id="cep" name="cep" type="text" class="mt-1 block w-full" wire:model.lazy='cep' required autofocus autocomplete="cep" />
        <x-input-error class="mt-2" :messages="$errors->get('cep')" />
    </div>

    <div>
        <x-input-label for="logradouro" :value="__('Logradouro')" />
        <x-text-input id="logradouro" name="logradouro" type="text" class="mt-1 block w-full" wire:model.lazy='logradouro' required autofocus autocomplete="logradouro" />
        <x-input-error class="mt-2" :messages="$errors->get('logradouro')" />
    </div>

    <div>
        <x-input-label for="numero" :value="__('Número')" />
        <x-text-input id="numero" name="numero" type="text" class="mt-1 block w-full" wire:model.lazy='numero' required autofocus autocomplete="numero" />
        <x-input-error class="mt-2" :messages="$errors->get('numero')" />
    </div>

    <div>
        <x-input-label for="complemento" :value="__('Complemento')" />
        <x-text-input id="complemento" name="complemento" type="text" class="mt-1 block w-full" wire:model.lazy='complemento' required autofocus autocomplete="complemento" />
        <x-input-error class="mt-2" :messages="$errors->get('complemento')" />
    </div>

    <div>
        <x-input-label for="bairro" :value="__('Bairro')" />
        <x-text-input id="bairro" name="bairro" type="text" class="mt-1 block w-full" wire:model.lazy='bairro' required autofocus autocomplete="bairro" />
        <x-input-error class="mt-2" :messages="$errors->get('bairro')" />
    </div>

    <div>
        <x-input-label for="cidade" :value="__('Cidade')" />
        <x-text-input id="cidade" name="cidade" type="text" class="mt-1 block w-full" wire:model.lazy='cidade' required autofocus autocomplete="cidade" />
        <x-input-error class="mt-2" :messages="$errors->get('cidade')" />
    </div>

    <div>
        <x-input-label for="estado" :value="__('Estado')" />
        <x-text-input id="estado" name="estado" type="text" class="mt-1 block w-full" wire:model.lazy='estado' required autofocus autocomplete="estado" />
        <x-input-error class="mt-2" :messages="$errors->get('estado')" />
    </div>
</div>
