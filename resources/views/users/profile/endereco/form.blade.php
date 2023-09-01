<div>
    <h1>VAMMMBORAAAA</h1>
    <form>
        <div>
            <label for="zipcode">CEP</label>
            <input id="zipcode" type="text" wire:model.lazy="zipcode" />
            @error('zipcode')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="city">Cidade</label>
            <input id="city" type="text" wire:model="city" />
        </div>
        <div>
            <label for="street">Rua</label>
            <input id="street" type="text" wire:model="street" />
        </div>
        <div>
            <label for="neighborhood">Bairro</label>
            <input id="neighborhood" type="text" wire:model="neighborhood" />
        </div>
        <div>
            <label for="state">Estado</label>
            <input id="state" type="text" wire:model="state" />
        </div>
        <div>
            <button type="button" wire:click="save">Procurar</button>
        </div>
    </form>
</div>
