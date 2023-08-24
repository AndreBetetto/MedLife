<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}

    <div>
        <form wire:submit.prevent="recomendaMedico">
            <input type="text" wire:model="input">
            <button type="submit">Submit</button>
        </form>
    
        <p>{{ $medico }}</p>
        <br><br><br>
    </div>
</div>
