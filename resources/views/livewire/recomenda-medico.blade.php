<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
    <button wire:click.prevent="fetchAPIdata">Fetch Data</button>
    <div>   
        <form wire:submit.prevent="recomenda">
            @if ($dataFetched == true)
                <select id="symptomsSelected[]" wire:model="symptomsSelected" multiple >
                    @foreach ($symptoms as $symptom)
                        <option value={{ $symptom['ID'] }}>{{ $symptom['Name'] }}-{{ $symptom['ID'] }}</option>
                    @endforeach
                </select>
            @endif
            <br><br><br>
            <button type="submit">Submit</button>
        </form> 
        Resultado:
        @forelse ($saida as $out)
            {{ $out['ID']}} - {{ $out['Name']}} - {{ $out['Accuracy']}}%
            <br>
        @empty
            Clinico geral
        @endforelse
        <br><br><br>
        
    </div>
</div>
