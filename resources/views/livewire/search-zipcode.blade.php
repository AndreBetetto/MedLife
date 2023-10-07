<div class="mt-14 w-2/4">
    <form class="flex flex-col gap-5">
        <div>
            <div>
                <x-input-label for="cep" :value="__('CEP')" />
                <x-text-input x-mask="99999-999" id="cep" name="cep" type="text" class="mt-1 block w-full" wire:model.lazy='cep' required autofocus autocomplete="cep" />
                <x-input-error class="mt-2" :messages="$errors->get('cep')" />
            </div>
            <div>
                <x-input-label for="rua" :value="__('Rua')" />
                <x-text-input id="rua" name="rua" type="text" class="mt-1 block w-full" wire:model.lazy='rua' required autofocus autocomplete="rua" />
                <x-input-error class="mt-2" :messages="$errors->get('rua')" />
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
        <div>
            <button class="text-xl rounded-2xl px-8 py-2 bg-green-300 content-center hover:bg-green-400 duration-200" type="button" wire:click="updatedZipcode">Procurar</button>
        </div>
    </form> 
</div>
