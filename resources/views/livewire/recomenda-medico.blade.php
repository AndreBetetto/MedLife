<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
    <button class="rounded-md bg-purple-300 px-3.5 py-2.5 text-sm font-semibold text-gray-900 shadow-sm hover:bg-blue-100 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue" wire:click.prevent="fetchAPIdata">
        Carregar lista de sintomas
    </button>
    <div>   
        <form wire:submit.prevent="recomenda">
            @if ($dataFetched == true)
                <select id="symptomsSelected[]" wire:model="symptomsSelected" multiple >
                    @foreach ($symptoms as $symptom)
                        <option value={{ $symptom['ID'] }}> {{ __('translations.'.$symptom['Name']) }} </option>
                    @endforeach
                </select>
            @endif
            <br><br><br>
            <button type="submit">Submit</button>
        </form> 
        <br>
        Resultado:<br>
        @forelse ($saida as $out)
            {{ $out['ID']}} - {{ __('translations.'.$out['Name']) }} - {{ $out['Accuracy']}}%
            <br>
        @empty
            Clinico geral
        @endforelse
        <br><br><br>
        
    </div>
</div>
