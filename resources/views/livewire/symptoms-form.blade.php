<div>
    @php
        $body = [
            'head' => 'Cabeça, garganta e pescoço',
            'torso' => 'Tórax e costas',
            'arms' => 'Braços e ombros',
            'abdomen' => 'Abdômen, pelve e nádegas',
            'legs' => 'Pernas',
            'skin' => 'Pele, articulações e geral'
        ];
        $idcabeca = 6;
        $idtorso = 15;
        $idbraco = 7;
        $idabdomen = 16;
        $idperna = 10;
        $idpele = 17;        


    @endphp
    
    <!-- Add a button to trigger the API request -->
    <button wire:click.prevent="fetchAPIdata">Fetch Data</button>
    @php
        if($isLoading === true){
            echo '<div class="loading-spinner"></div>';
        }
    @endphp
    <!-- Display a loading spinner while the API request is in progress -->
    <div class="text-center justify-center items-center">
        <p class="text-base font-semibold leading-tight text-gray-800 p-3">
            Sintomas
        </p>
    </div>
    <select name="symHead[]" id="symHead[]" wire:model="symAll" multiple='' >
        @foreach ($symptoms as $symptomHead)
            <option value="{{ $symptomHead['ID'] }}">{{ __('translations.'.$symptomHead['Name']) }}</option>
        @endforeach
        
    </select>
    <script>
        new MultiSelectTag('symHead[]')  // id
    </script>
    @if ($dataFetched == true)
        <script>
            new MultiSelectTag('symHead[]', {
                shadow: true,
                placeholder: 'Sintomas da cabeca'  // default Search...
            })  // id
        </script>
    @endif
    <br>
    <div>
        @foreach ($selectedSymptomHead as $symptomId => $symptomName)
            <span class="selected-symptom">
                {{ $symptomName }}
                <button wire:click="removeSelectedSymptom('{{ $symptomId }}')" class="remove-button">Remove</button>
            </span>
        @endforeach
    </div>
    {{-- 
    <br><table class="customTable">
        <tr>
            <td>
                <img src="public/logo.png" alt="corpo humano" width="50px">
                Imagem de um corpo humano (nao ta funcionando ainda!!!)
                Deve ocupar essas 7 linhas, de forma com que esteja alinhado a cada parte do corpo
            </td>
            <td>
                <div class="text-center justify-center items-center">
                    <p class="text-xl font-bold leading-tight text-gray-800">
                        Sintomas
                    </p>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                .
            </td>
            <td>
                <select name="symHead[]" id="symHead[]" wire:model="symHead" multiple='' >
        @foreach ($symptomsHead as $symptomHead)
            <option value="{{ $symptomHead['ID'] }}">{{ __('translations.'.$symptomHead['Name']) }}</option>
        @endforeach
        
    </select>
    <script>
        new MultiSelectTag('symHead[]')  // id
    </script>
    @if ($dataFetched == true)
        <script>
            new MultiSelectTag('symHead[]', {
                shadow: true,
                placeholder: 'Sintomas da cabeca'  // default Search...
            })  // id
        </script>
    @endif
    <br>
    <div>
        @foreach ($selectedSymptomHead as $symptomId => $symptomName)
            <span class="selected-symptom">
                {{ $symptomName }}
                <button wire:click="removeSelectedSymptom('{{ $symptomId }}')" class="remove-button">Remove</button>
            </span>
        @endforeach
    </div>
            </td>
        </tr> --}}
        {{-- 
        <tr>
            <td>
                .
            </td>
            <td>
                <div class="text-center justify-center items-center">
                    <p class="text-base font-semibold leading-tight text-gray-800 p-3">
                        Sintomas torso
                    </p>
                </div>
                <select name="symTorso[]" id="symTorso[]" wire:model="symTorso" multiple>
                    @foreach ($symptomsTorso as $symptomTorso)
                        <option value="{{ $symptomTorso['ID'] }}">{{ __('translations.'.$symptomTorso['Name']) }}</option>
                    @endforeach
                </select>
                <script>
                    new MultiSelectTag('symTorso[]')  // id
                </script>
                @if ($dataFetched == true)
                    <script>
                        new MultiSelectTag('symTorso[]')  // id
                    </script>
                @endif<br>
                <div>
                    @foreach ($selectedSymptomTorso as $symptomId => $symptomName)
                        <span class="selected-symptom">
                            {{ $symptomName }}
                            <button wire:click="removeSelectedSymptom('{{ $symptomId }}')" class="remove-button">Remove</button>
                        </span>
                    @endforeach
                </div>
            </td>
        </tr>
        <tr>
            <td>
                . 
            </td>
            <td>
                <div class="text-center justify-center items-center">
                    <p class="text-base font-semibold leading-tight text-gray-800 p-3">
                        Sintomas braço
                    </p>
                </div>
                <select name="symArms[]" id="symArms[]" wire:model="symArms" multiple>
                    @foreach ($symptomsArms as $symptomArms)
                        <option value="{{ $symptomArms['ID'] }}">{{ __('translations.'.$symptomArms['Name'])  }}</option>
                    @endforeach
                </select>
                <script>
                    new MultiSelectTag('symArms[]')  // id
                </script>
                @if ($dataFetched == true)
                    <script>
                        new MultiSelectTag('symArms[]')  // id
                    </script>
                @endif<br>
                <div>
                    @foreach ($selectedSymptomArms as $symptomId => $symptomName)
                        <span class="selected-symptom">
                            {{ $symptomName }}
                            <button wire:click="removeSelectedSymptom('{{ $symptomId }}')" class="remove-button">Remove</button>
                        </span>
                    @endforeach
                </div>
            </td>
        </tr>
        <tr>
            <td>
                .
            </td>
            <td>
                <div class="text-center justify-center items-center">
                    <p class="text-base font-semibold leading-tight text-gray-800 p-3">
                        Sintomas perna
                    </p>
                </div>
                <div>
                <select name="symLegs[]" id="symLegs[]" wire:model='symLegs' multiple>
                    @foreach ($symptomsLegs as $symptomLegs)
                        <option value="{{ $symptomLegs['ID'] }}">{{ __('translations.'.$symptomLegs['Name']) }}</option>
                    @endforeach
                </select>
                <script>
                    new MultiSelectTag('symLegs[]')  // id
                </script>
                @if ($dataFetched == true)
                    <script>
                        new MultiSelectTag('symLegs[]')  // id
                    </script>
                @endif<br>
                @php
                    $i = 0;
                @endphp
                
                @foreach ($selectedSymptomLegs as $symp)
                    @php
                        $i++;
                    @endphp
                    Sintomas n{{$i}} {{ $symp }}
                @endforeach
                </div>
                <div>
                    @foreach ($selectedSymptomLegs as $symptomId => $symptomName)
                        <span class="selected-symptom">
                            {{ $symptomName }}
                            <button wire:click="removeSelectedSymptom('{{ $symptomId }}')" class="remove-button">Remove</button>
                        </span>
                    @endforeach
                </div>
            </td>
        </tr>
        <tr>
            <td>
                .
            </td>
            <td>
                <div class="text-center justify-center items-center">
                    <p class="text-base font-semibold leading-tight text-gray-800 p-3">
                        Sintomas abdômen e glúteo
                    </p>
                </div>
                <select name="symAbdomen[]" id="symAbdomen[]" wire:model='symAbdomen' multiple>
                    @foreach ($symptomsAbdomen as $symptomAbdomen)
                        <option value="{{ $symptomAbdomen['ID'] }}">{{ __('translations.'.$symptomAbdomen['Name']) }}</option>
                    @endforeach
                </select>
                <script>
                    new MultiSelectTag('symAbdomen[]')  // id
                </script>
                @if ($dataFetched == true)
                    <script>
                        new MultiSelectTag('symAbdomen[]')  // id
                    </script>
                @endif<br>
                <div>
                    @foreach ($selectedSymptomAbdomen as $symptomId => $symptomName)
                        <span class="selected-symptom">
                            {{ $symptomName }}
                            <button wire:click="removeSelectedSymptom('{{ $symptomId }}')" class="remove-button">Remove</button>
                        </span>
                    @endforeach
                </div>
            </td>
        </tr>
        <tr>
            <td>
                .
            </td>
            <td>
                <div class="text-center justify-center items-center">
                    <p class="text-base font-semibold leading-tight text-gray-800 p-3">
                        Sintomas pele
                    </p>
                </div>
                <select name="symSkin[]" id="symSkin[]" wire:model='symSkin' multiple>
                    @foreach ($symptomsSkin as $symptomSkin)
                        <option value="{{ $symptomSkin['ID'] }}">{{ __('translations.'.$symptomSkin['Name']) }}</option>
                    @endforeach
                </select>
                <script>
                    new MultiSelectTag('symSkin[]')  // id
                </script>
                @if ($dataFetched == true)
                    <script>
                        new MultiSelectTag('symSkin[]')  // id
                    </script>
                @endif<br>--}}
                <div>
                    @foreach ($selectedSymptomSkin as $symptomId => $symptomName)
                        <span class="selected-symptom">
                            {{ $symptomName }}
                            <button wire:click="removeSelectedSymptom('{{ $symptomId }}')" class="remove-button">Remove</button>
                        </span>
                    @endforeach
                </div>
                {{-- 
            </td>
        </tr>
    </table>--}}
</div>
