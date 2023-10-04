<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
    <br>
    <button class="rounded-md bg-purple-300 px-3.5 py-2.5 text-sm font-semibold text-gray-900 shadow-sm hover:bg-blue-100 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue" wire:click.prevent="fetchAPIdata">
        Carregar lista de sintomas
    </button> <br>
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
            <button  class="rounded-md bg-purple-300 px-3.5 py-2.5 text-sm font-semibold text-gray-900 shadow-sm hover:bg-blue-100 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue" wire:click.prevent="getSpecialization" type="submit">Submit</button>
        </form> 
        <br>
        <label class="font-semibold">Resultado:</label>
        @forelse ($saida as $out)
            {{ $out['ID']}} - {{ __('translations.'.$out['Name']) }} - {{ $out['Accuracy']}}%
            <br>
        @empty
            Clínico geral
        @endforelse
        <br><br><br>
        
    </div>
</div>
